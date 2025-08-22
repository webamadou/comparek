<?php

namespace Database\Seeders;

use App\Enums\BankCategory;
use App\Enums\FeeType;
use App\Enums\FeeUnit;
use App\Enums\ProductType;
use App\Enums\RateType;
use App\Models\Bank;
use App\Models\BankProduct;
use App\Models\ProductFee;
use App\Models\ProductInterestRate;
use App\Models\ProductOffer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BankSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            ['name' => 'CBAO Attijariwafa bank', 'swift_bic' => 'CBAOSNDA'],
            ['name' => 'Société Générale Sénégal (SGBS)', 'swift_bic' => 'SGSOSNDA'],
            ['name' => 'Ecobank Sénégal', 'swift_bic' => 'ECOCSNDA'],
            ['name' => 'UBA Sénégal', 'swift_bic' => 'UNAFSNDA'],
            ['name' => 'Bank Of Africa Sénégal (BOA)', 'swift_bic' => 'AFRKSNDA'],
        ];

        foreach ($banks as $b) {
            $bank = Bank::query()->firstOrCreate(
                ['slug' => Str::slug($b['name'])],
                [
                    'name' => $b['name'],
                    'logo_path' => null,
                    'website_url' => null,
                    'email' => null,
                    'phone' => null,
                    'country_code' => 'SN',
                    'swift_bic' => $b['swift_bic'] ?? null,
                    'regulatory_license' => null,
                    'headquarters_location' => 'Dakar',
                    'established_year' => 2000,
                    'category' => BankCategory::BANK->value,
                    'is_active' => true,
                    'description' => 'Banque de démo pour Comparek.',
                    'metadata' => [],
                ]
            );

            // 3 produits par banque
            $products = [
                [
                    'name' => 'Compte Courant',
                    'type' => ProductType::CURRENT_ACCOUNT->value,
                    'desc' => 'Compte courant particulier en XOF.',
                ],
                [
                    'name' => 'Compte Épargne',
                    'type' => ProductType::SAVINGS_ACCOUNT->value,
                    'desc' => 'Compte épargne rémunéré.',
                ],
                [
                    'name' => 'Crédit Consommation',
                    'type' => ProductType::CONSUMER_LOAN->value,
                    'desc' => 'Crédit à la consommation pour particuliers.',
                ],
            ];

            foreach ($products as $p) {
                $product = BankProduct::query()->firstOrCreate(
                    ['bank_id' => $bank->id, 'slug' => Str::slug($p['name'])],
                    [
                        'name' => $p['name'],
                        'product_type' => $p['type'],
                        'currency' => 'XOF',
                        'is_active' => true,
                        'description' => $p['desc'],
                    ]
                );

                // 3 offres par produit
                $offers = [
                    ['name' => 'Essentiel', 'desc' => 'Offre d’entrée de gamme.'],
                    ['name' => 'Plus', 'desc' => 'Offre milieu de gamme.'],
                    ['name' => 'Premium', 'desc' => 'Offre haut de gamme.'],
                ];

                foreach ($offers as $o) {
                    $offer = ProductOffer::query()->firstOrCreate(
                        ['bank_product_id' => $product->id, 'slug' => Str::slug($o['name'])],
                        [
                            'name' => $o['name'],
                            'description' => $o['desc'],
                            'min_income' => 0,
                            'min_age' => 18,
                            'required_documents' => ['CNI', 'Justificatif de domicile'],
                            'eligibility' => [],
                            'min_term_months' => $product->product_type === ProductType::CONSUMER_LOAN ? 6 : null,
                            'max_term_months' => $product->product_type === ProductType::CONSUMER_LOAN ? 60 : null,
                            'min_loan_amount' => $product->product_type === ProductType::CONSUMER_LOAN ? 100000 : null,
                            'max_loan_amount' => $product->product_type === ProductType::CONSUMER_LOAN ? 10000000 : null,
                            'effective_from' => now()->toDateString(),
                            'effective_to' => null,
                            'is_active' => true,
                        ]
                    );

                    // FRAIS types
                    // Comptes: tenue de compte, carte annuelle, virement interbancaire
                    // Crédit conso: frais de dossier + assurance (en pourcentage)
                    if (in_array($product->product_type, [
                        ProductType::CURRENT_ACCOUNT->value,
                        ProductType::SAVINGS_ACCOUNT->value,
                    ], true)) {
                        $this->fee($offer, FeeType::ACCOUNT_MAINTENANCE->value, FeeUnit::PER_MONTH->value, amount: $this->tierAmount($o['name'], [500, 1000, 1500]));
                        $this->fee($offer, FeeType::CARD_ANNUAL->value,        FeeUnit::PER_YEAR->value, amount: $this->tierAmount($o['name'], [8000, 12000, 20000]));
                        $this->fee($offer, FeeType::TRANSFER_INTERBANK_DOM->value, FeeUnit::PER_OPERATION->value, percentage: 0.5, min: 500, max: 5000);
                    }

                    if ($product->product_type === ProductType::CONSUMER_LOAN->value) {
                        $this->fee($offer, FeeType::LOAN_FILE->value, FeeUnit::PER_OPERATION->value, percentage: 1.0, min: 5000, max: 50000);
                        $this->fee($offer, FeeType::INSURANCE_PREMIUM->value, FeeUnit::PER_MONTH->value, percentage: 0.2, min: 0, max: 0);
                        // Taux (APR approximatif de démo)
                        ProductInterestRate::firstOrCreate(
                            ['product_offer_id' => $offer->id, 'rate_type' => RateType::APR->value, 'is_fixed' => true],
                            [
                                'value_percent' => $this->tierRate($o['name'], [9.5, 11.5, 13.5]),
                                'reference_index' => null,
                                'spread_percent' => null,
                                'conditions' => ['simulation' => 'Données démo pour tests.'],
                            ]
                        );
                    }
                }
            }
        }
    }

    private function fee(ProductOffer $offer, string $feeType, string $unit, ?float $amount = null, ?float $percentage = null, ?float $min = null, ?float $max = null): void
    {
        ProductFee::firstOrCreate(
            [
                'product_offer_id' => $offer->id,
                'fee_type' => $feeType,
                'unit' => $unit,
            ],
            [
                'amount' => $amount,
                'percentage' => $percentage,
                'min_amount' => $min,
                'max_amount' => $max,
                'conditions' => [],
            ]
        );
    }

    private function tierAmount(string $tier, array $values): float
    {
        // Essentiel, Plus, Premium => index 0,1,2
        return match (strtolower($tier)) {
            'essentiel' => (float) $values[0],
            'plus'      => (float) $values[1],
            default     => (float) $values[2],
        };
    }

    private function tierRate(string $tier, array $values): float
    {
        return $this->tierAmount($tier, $values);
    }
}
