<div class="tab-pane fade show active" id="paypal-settings" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        {{-- صفجه الاعدات  انتبه في ملفات  بالسيرفر بروفايدر وكمان بالكوفنغ --}}
        <div class="card-body">
            <form action="{{ route('paypal-settings-update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Paypal-Status</label>
                    <select name="paypal_status" id="" class="form-control">

                        <option {{@$paymentGateway['paypal_status'] === 1 ? 'selected' : ''}} value="1">Active</option>
                        <option {{@$paymentGateway['paypal_status'] === 0 ? 'selected' : ''}} value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Paypal-Account-Mode</label>
                    <select name="paypal_account_mode" id=""class="form-control">
                        <option {{@$paymentGateway['paypal_account_mode'] === 'sandbox'? 'selected' : ''}} value="sandbox">SandBox</option>
                        <option {{@$paymentGateway['paypal_account_mode'] === 'live'   ? 'selected' : ''}} value="sandbox">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select name="paypal_country" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.time_zone') as $key => $paypal_country)
                        <option {{@$paymentGateway['paypal_country'] === $key ? 'selected' : ''}}
                        value="{{$key}}">{{$key}}</option>
                        @endforeach


                    </select>
                </div>

                <div class="form-group">
                    <label>Default Currency Name</label>
                    <select name="paypal_currency" id="" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.currecy_list') as $key => $paypal_currency)
                            <option {{@$paymentGateway['paypal_currency'] === $key ? 'selected' : '' }}
                                value="{{$key}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>currency-Rate</label>
                    <input type="text" name="paypal_rate" class="form-control"value="{{@$paymentGateway['paypal_rate']}}">
                </div>

                <div class="form-group">
                    <label>Paypal client Id</label>
                    <input type="text" name="paypal_api_key" class="form-control"value="{{@$paymentGateway['paypal_api_key']}}">
                </div>

                <div class="form-group">
                    <label>Paypal  secriet Key</label>
                    <input type="text" name="paypal_secret_key" class="form-control"value="{{@$paymentGateway['paypal_secret_key']}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
