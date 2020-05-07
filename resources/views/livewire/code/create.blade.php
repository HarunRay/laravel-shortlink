<div class="mb-4">
    <form wire:submit.prevent="addLink">
        <div class="form-group">
            <label for="link">Add your full link:</label>
            <textarea
                name="link"
                id="link"
                class="form-control
                @error('link') is-invalid @enderror"
                wire:model="link"
                placeholder="ex: https://harunrrayhan.com"
            ></textarea>

            @error('link')
            <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Generate
        </button>
    </form>
</div>
