<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        {{-- صفجه الاعدات  انتبه في ملفات  بالسيرفر بروفايدر وكمان بالكوفنغ --}}
        <div class="card-body">
            <form action="{{ route('generale-setting-update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ @$generalSetting->site_name }}">
                </div>

                <div class="form-group">
                    <label>Layout</label>
                <select name="layout"class="form-control">
                    <option {{@$generalSetting->layout == 'LTR' ? 'selected' : ''}} value="LTR">LTR</option>
                    <option {{@$generalSetting->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                </select>
                </div>


                <div class="form-group">
                    <label>Contact-Email</label>
                    <input type="text" name="contact_email" class="form-control" value="{{ @$generalSetting->contact_email}}">
                </div>

                {{-- العمله في ملف بالكونفغ اسمو setting ومن  الملف عملنا فور اتش --}}
                <div class="form-group">
                    <label>Default Currecy Name</label>
                    <select name="currecy_name" id="" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.currecy_list') as $key=>$currency)
                        <option {{@$generalSetting->currecy_name == $currency ? 'selected' : ''}} value="{{$currency}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Icon</label>
                    <input type="text" name="currency_icon" class="form-control" value="{{ @$generalSetting->currency_icon}}">
                </div>


                <div class="form-group">
                    <label>TimeZone</label>
                    <select name="time_zone" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.time_zone') as $key=> $timeZone)
                        <option {{@$generalSetting->time_zone == $key ? 'selected' : ''}} value="{{$key}}">{{$key}}</option>
                        @endforeach


                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
    </div>
