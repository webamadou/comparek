@props(['showDeleteModal', 'title' => 'Confirm deletion', 'message' => 'Are you sure you want to delete?'])

@if ($showDeleteModal)
    <div class="modal show d-block" tabindex="-1" role="dialog" style="background: rgba(0,0,0,0.5)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                </div>
                <div class="modal-body">
                    <p>{{ $message }}</p>
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('showDeleteModal', false)" type="button" class="btn btn-secondary">Cancel</button>
                    <button wire:click="delete" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endif
