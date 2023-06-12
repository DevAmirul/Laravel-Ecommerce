<div>
    <div class="register-form form-item ">
        <form class="form-stl" name="frm-login">
            <fieldset class="wrap-input">
                <input wire:model.defer='string' type="text" id="frm-reg-lname" name="reg-lname"
                    placeholder="string">
                @error('string') <span class="error">{{ $string }}</span> @enderror
            </fieldset>

                <h2>
                    {{ $pass }}
                </h2>
            <button wire:click.prevent='makePass()' type="submit" class="btn btn-sign" name="register">submit
            </button>
        </form>
    </div>
</div>
