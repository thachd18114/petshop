<section class="">
    <div class="container" style="padding-bottom: 20px">
    <form class="form-horizontal"name="frmcapnhat" id="frmcapnhat" action="{{ route('frontend.update_acount') }}" method="post">
        {{ csrf_field() }}
          <table class="taikhoan" style="width: 600px;margin: auto">
              <tr>
                  <td colspan="2" style="text-align: center"> <h1 style="padding: 25px 0">Thông tin tài khoản</h1></td>
              </tr>
              <tr>
                  <td>Tài Khoản</td>
                  <td> <input type="text" id="kh_taiKhoan" name="kh_taiKhoan" readonly class="form-control" value="{{$tk->kh_taiKhoan}}"></td>
              </tr>
              <tr>
                  <td>Mật khẩu mới</td>
                  <td> <input type="text" id="kh_matKhau" name="kh_matKhau" class="form-control" ></td>
              </tr>
              <tr>
                  <td>Họ tên</td>
                  <td> <input type="text" name="kh_hoTen" readonly class="form-control" value="{{$tk->kh_hoTen}}"></td>
              </tr>
              <tr>
                  <td>Giới tính </td>
                  <td>  <select class="form-control" name="kh_gioiTinh">
                          <option value="1" {{ old('kh_gioiTinh', $tk->kh_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
                          <option value="2"{{ old('kh_gioiTinh', $tk->kh_gioiTinh) == 2 ? "selected" : "" }} >Nữ</option>
                      </select></td>
              </tr>
              <tr>
                  <td>Ngày sinh </td>
                  <td> <input type="date" name="kh_ngaySinh" class="form-control"   value="{{$tk->kh_ngaySinh->format('Y-m-d')}}"></td>
              </tr>
              <tr>
                  <td>Email </td>
                  <td> <input type="text" name="kh_email" class="form-control"value="{{$tk->kh_email}}"></td>
              </tr>
              <tr>
                  <td>Địa chỉ </td>
                  <td> <input type="text" name="kh_diaChi" class="form-control"value="{{$tk->kh_diaChi}}"></td>
              </tr>
              <tr>
                  <td>Điện thoại </td>
                  <td> <input type="text" name="kh_dienThoai" class="form-control" value="{{$tk->kh_dienThoai}}"></td>
              </tr>
              <tr>
                  <td colspan="2"> <div style="margin-top: 20px">
                          @if(session()->has('success'))
                              <div class="alert alert-success">
                                  {{ session()->get('success') }}
                              </div>
                          @endif
                          @if(session()->has('error'))
                              <div class="alert alert-danger">
                                  {{ session()->get('error') }}
                              </div>
                          @endif
                      </div></td>
              </tr>
              <tr>
                  <td></td>
                  <td>
                      <button class="btn btn-danger" type="submit" >Cập nhật</button>
                      <button class="btn btn-danger" type="reset" >Hủy</button>
                  </td>
              </tr>

              <tr>
                  <td colspan="2" style="text-align: center"><div class="clearfix"></div>
                      <br />

                      <div style="padding-bottom: 10px;">

                      </div></td>
              </tr>
          </table>

    </form>
    </div>
</section>

<style>
    .taikhoan td {
        padding: 5px 5px;
    }
    .error {
        color: red;
    }
</style>
@section('custom-scripts')
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#frmcapnhat").validate({
                onkeyup: false,
                rules: {
                    kh_email:{
                        required: true,
                        email: true,
                        maxlength: 50,
                    },
                    kh_ngaySinh:{
                        required: true
                    },
                    kh_dienThoai:{
                        required: true,
                        maxlength: 10,
                        digits: true
                    },
                    kh_diaChi:{
                        required: true
                    },
                },messages: {

                    kh_email:{
                        required: 'Vui lòng nhập email',
                        email: 'Sai định dạng email vd: a@b',
                        maxlength: 'Vượt 50 ký tự cho phép'
                    },
                    kh_ngaySinh:{
                        required: 'Vui lòng nhập ngày sinh'
                    },
                    kh_dienThoai:{
                        required: 'Vui lòng nhập số điện thoại',
                        maxlength: 'Vượt 10 số cho phép',
                        digits: 'Chỉ được nhập số'
                    },
                    kh_diaChi:{
                        required: 'Vui lòng nhập địa chỉ'
                    },
                }
            });
        });
    </script>
@endsection