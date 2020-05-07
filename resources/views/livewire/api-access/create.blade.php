<div>
    <form wire:submit.prevent="createAccess">
        <div class="form-group">
            <label for="name">Token Name:</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control @error('link') is-invalid @enderror"
                wire:model="name"
                placeholder="Name of the token"
                required
            >

            @error('name')
            <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Create Access
        </button>
    </form>
</div>
