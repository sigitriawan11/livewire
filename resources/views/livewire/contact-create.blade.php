<div>
    <form wire:submit.prevent="store" class="mb-3">
        <div class="flex">
            <div class="mb-1">
                <input
                type="text"
                wire:model="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Name">
                @error('name')
                  <span class="text-danger">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-1">
                <input
                type="text"
                wire:model="phone"
                class="form-control @error('phone') is-invalid @enderror"
                placeholder="Phone">
                @error('phone')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
</div>
