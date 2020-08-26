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

        <div class="form-group">
            <label for="private">
                <input
                    id="private"
                    name="private"
                    type="checkbox"
                    value="1"
                    class="form-control @error('private') is-invalid @enderror"
                    wire:model="private"
                > Private Link
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Generate
        </button>
    </form>
</div>
