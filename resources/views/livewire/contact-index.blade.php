<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (!$statusUpdate)
        <livewire:contact-create></livewire:contact-create>
    @else
        <livewire:contact-update></livewire:contact-update>
    @endif

    <select wire:model="paginate" class="form-control-sm mb-3">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>

      <input type="text" class="form-control form-control-sm mb-3" wire:model="search" placeholder="Search">

    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contacts as $contact)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <button class="btn btn-sm btn-info text-white" wire:click="getContact({{ $contact->id }})">Edit</button>
                <button class="btn btn-sm btn-danger text-white" wire:click="delete({{ $contact->id }})">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
