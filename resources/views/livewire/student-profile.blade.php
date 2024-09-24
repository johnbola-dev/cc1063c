<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    </div>

    <div class="mt-5">
        <div class="row">
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">StudentID</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" @if ($updateStatus == true) disabled

                        @endif class="form-control" id="studentid" wire:model='studentid'>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">Lastname</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="studentid" wire:model='lastname'>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">Firstname</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="studentid" wire:model='firstname'>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">Middlename</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="studentid" wire:model='middlename'>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">Sex</label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example" wire:model='sex'>
                            <option selected>Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="studentid" class="form-label">Program</label>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-select" aria-label="Default select example" wire:model='program'>
                            <option selected>Program</option>
                            <option value="BSCS">BSCS</option>
                            <option value="BSIS">BSIS</option>
                          </select>
                    </div>

                </div>
            </div>
            <div class="mb-1">
                @if ($updateStatus)
                <button type="submit" class="btn btn-sm btn-primary" wire:click='updateprofile'>Update</button>
                @else
                <button type="submit" class="btn btn-sm btn-primary" wire:click='insert'>Submit</button>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Program</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($profiles) --}}
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->student_id }}</td>
                            <td>{{ $profile->lastname }}, {{ $profile->firstname }} {{ $profile->middlename }}</td>
                            <td>{{ $profile->sex }}</td>
                            <td>{{ $profile->program }}</td>
                            <td>{{ $profile->created_at }}</td>
                            <td>
                                <button class="btn btn-danger" wire:click='delete({{ $profile->id }})'>Delete</button>
                                <button class="btn btn-primary" wire:click='update({{ $profile->id }})'>Update</button>
                         </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
