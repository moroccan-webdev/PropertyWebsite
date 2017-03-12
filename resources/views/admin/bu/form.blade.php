
        <div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Name : </label>
            <div class="col-md-10">
                {!! Form::text("bu_name",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Rooms : </label>
            <div class="col-md-10">
                {!! Form::text("rooms",null,['class' => 'form-control']) !!}
                @if ($errors->has('rooms'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rooms') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Price : </label>
            <div class="col-md-10">
                {!! Form::text("bu_price",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Place : </label>
            <div class="col-md-10">
                {!! Form::select("bu_place",bu_place(), null,['class' => 'form-control select2']) !!}
                @if ($errors->has('bu_place'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_place') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Rent : </label>
            <div class="col-md-10">
                {!! Form::select("bu_rent",bu_rent(),null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_rent'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_rent') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Square : </label>
            <div class="col-md-10">
                {!! Form::text("bu_square",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_square'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_square') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Type : </label>
            <div class="col-md-10">
                {!! Form::select("bu_type",bu_type(),null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Meta : </label>
            <div class="col-md-10">
                {!! Form::text("bu_meta",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_meta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_meta') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Small Description : </label>
            <div class="col-md-10">
                {!! Form::textarea("bu_small_dis",null,['class' => 'form-control','rows' => '4']) !!}
                @if ($errors->has('bu_small_dis'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                    </span>
                @endif
                <span class="alert alert-warning">This field is limited to 160 caracter</span>
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_longitude') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Longitude : </label>
            <div class="col-md-10">
                {!! Form::text("bu_longitude",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_longitude'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_longitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Latitude : </label>
            <div class="col-md-10">
                {!! Form::text("bu_latitude",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_latitude'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_latitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Large Description : </label>
            <div class="col-md-10">
                {!! Form::text("bu_large_dis",null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_large_dis'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_large_dis') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">
            <label class="col-md-2" for="">Status : </label>
            <div class="col-md-10">
                {!! Form::select("bu_status",bu_status(),null,['class' => 'form-control']) !!}
                @if ($errors->has('bu_status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-warning">
                    Add Estate
                </button>
            </div>
        </div>
<div>
  <div class="clearfix"></div>
</div>
