@extends('auth.master')

@section('content')
    

<div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title">Payment using Bkash</h3>
          <h4 style="color:red;">
            {{isset($p)?$p:''}}
          </h4>
          <p>
            Brac Bank 
ACC : 1304104667580001
Name : Md S Ahmed 
<br>
বিকাশ থেকে যেভাবে ব্র্যাক ব্যাঙ্ক একাউন্টে টাকা পাঠাবেন:

আরো > ট্রান্সফার মানি > ব্যাংক একাউন্ট> ব্র্যাক ব্যাংক
সিলেক্ট - অন্যের তারপর ব্যাঙ্ক একাউন্ট নাম্বার এবং নাম
          </p>
          <p>
            <b>Brac Bank ACC : 1304104667580001</b>
          </p>
        </div> <!-- /.box-header -->
        <div class="box-body">
            <form action="{{route('admin.submitBkash')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" class="form-control" id="email" name="id" value="{{$merchant->shop_id}}">

              <div class="form-group">
                <label for="email">Bkash No:</label>
                <input type="number" class="form-control" id="email" name="bkash" required>
              </div>
              <div class="form-group">
                <label for="pwd">Transaction ID:</label>
                <input type="text" class="form-control" id="pwd" name="txtid" required>
              </div>
             
              <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>

    </div>
@endsection