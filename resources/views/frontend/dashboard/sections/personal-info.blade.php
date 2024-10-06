<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="fp_dashboard_body">
    <h3 style="color: rgb(29, 28, 25)">Profile: {{Auth::user()->name}}</h3>

    <div class="fp__dsahboard_overview">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>total order <span>(76)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item green">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>Completed <span>(71)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item red">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>cancel <span>(05)</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="fp_dash_personal_info">
        <h4>Parsonal Information
            <a class="dash_info_btn">
                <span class="edit">edit</span>
                <span class="cancel">cancel</span>
            </a>
        </h4>

        <div class="personal_info_text">
            <p><span>Name:</span>{{Auth::user()->name}}</p>
            <p><span>Email:</span> {{Auth::user()->email}}</p>

        </div>

        <div class="fp_dash_personal_info_edit comment_input p-0">
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="fp__comment_imput_single">
                            <label>name</label>
                            <input type="text" id="name" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fp__comment_imput_single">
                            <label>email</label>
                            <input id="email" type="email" name="email" placeholder="Email"value="{{Auth::user()->email }}">
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <button type="submit" class="common_btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
