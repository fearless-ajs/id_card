<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="login-container">
            <h2 class="login-title">STAFF PORTAL</h2>
            <form wire:submit.prevent="check">
                <div class="form-group">
                    <label for="employee_id">Employee Id</label>
                    <input type="text" wire:model.lazy="employeeId" placeholder="Enter employee ID" class="form-control  {{$errors->has('employeeId')? 'is-invalid' : '' }}" id="employee_id">
                    @error('employeeId') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <button type="submit"  wire:loading.remove wire:target="check" class="login-btn btn btn-primary btn-block">FETCH INFO</button>
                <button type="submit"  wire:loading wire:target="check" class="login-btn btn btn-primary btn-block">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
                Not a registered staff? <a href="{{route('register-user')}}">click here</a> to register
            </form>
        </div>
    </div>
</div>
