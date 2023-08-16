<div class="row">
        <div class="col-md-6 mx-auto">
            <div class="login-container">
                <h2 class="login-title">STAFF REGISTRATION</h2>
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" wire:model.lazy="name" class="form-control  {{$errors->has('name')? 'is-invalid' : '' }}" id="fullname" placeholder="Enter your full name">
                        @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" wire:model.lazy="email"  class="form-control  {{$errors->has('email')? 'is-invalid' : '' }}" id="username" placeholder="Enter your username">
                        @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" wire:model.lazy="phone" class="form-control  {{$errors->has('phone')? 'is-invalid' : '' }}" id="phone" placeholder="Enter your phone number">
                        @error('phone') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" wire:model.lazy="role" class="form-control  {{$errors->has('role')? 'is-invalid' : '' }}" id="role" placeholder="Enter your role in the company">
                        @error('role') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Employee Id</label>
                        <input type="text" wire:model.lazy="employeeId" class="form-control  {{$errors->has('employeeId')? 'is-invalid' : '' }}" id="employee_id" disabled>
                        @error('employeeId') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" wire:model.lazy="address" class="form-control  {{$errors->has('address')? 'is-invalid' : '' }}" id="address" placeholder="Enter residential address">
                        @error('address') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Passport Image <sup>max 4MB</sup></label>
                        <input type="file" wire:model.lazy="image"  class="form-control  {{$errors->has('image')? 'is-invalid' : '' }}" id="image">
                        @error('image') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>

                    @if($image)
                        <div class="form-group text-center">
                            <a target="_blank" href="{{ $image->temporaryUrl() }}" >
                                <img src="{{ $image->temporaryUrl() }}" style="margin-bottom: 5px; border: 1px solid white; max-width: 30%">
                            </a>
                        </div>
                    @endif

{{--                    <div class="form-group">--}}
{{--                        <label for="password">Password</label>--}}
{{--                        <input type="password"  wire:model.lazy="password" class="form-control  {{$errors->has('password')? 'is-invalid' : '' }}" id="password" placeholder="Enter your password">--}}
{{--                        @error('password') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="password_verification">Password</label>--}}
{{--                        <input type="password" wire:model.lazy="password_confirmation" class="form-control  {{$errors->has('password_confirmation')? 'is-invalid' : '' }}" id="password_verification" placeholder="Confirm your password">--}}
{{--                        @error('password_confirmation') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror--}}
{{--                    </div>--}}
                    <button type="submit"  wire:loading.remove wire:target="save" class="login-btn btn btn-primary btn-block">SAVE DATA</button>
                    <button type="submit"  wire:loading wire:target="save" class="login-btn btn btn-primary btn-block">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                    <p>
                        Already a registered staff? <a href="{{route("check-info")}}">click here</a> to check you information
                    </p>
                </form>
            </div>
        </div>
</div>
