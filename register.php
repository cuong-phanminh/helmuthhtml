<form action="" method="post">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="firstname">Họ:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Nhập họ...">
                    </div>
                    <div class="col-md-6">
                        <label for="lastname">Tên:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Nhập tên...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại: </label>
                    <input type="phone" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email...">
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ...">
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label for="city">Chọn thành phố:</label>
                        <select id="city" name="city">
                            <option value="">Chọn</option>
                            <option value="binhdinh">Bình Định</option>
                            <option value="danang">Đà Nẵng</option>
                            <option value="saigon">Sài Gòn</option>
                            <option value="cantho">Cần Thơ</option>
                            <option value="hanoi">Hà Nội</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="zipcode">Zip code:</label>
                        <select id="zipcode" name="zipcode">
                            <option value="">Chọn</option>
                            <option value="55000">55000</option>
                            <option value="50000">50000</option>
                            <option value="70000 – 74000">70000 – 74000</option>
                            <option value="94000">94000</option>
                            <option value="10000 – 14000">10000 – 14000</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="state">State:</label>
                        <select id="state" name="state">
                            <option value="">Chọn</option>
                            <option value="alabama">Alabama</option>District Of Columbia
                            <option value="alaska">Alaska</option>
                            <option value="District Of Columbia">District Of Columbia</option>
                        </select>
                    </div>  
                </div>


                <div class="form-group">
                    <label for="pwd">Mật khẩu: </label>
                    <input type="password" class="form-control" name="pass1" placeholder="Nhập mật khẩu...">
                </div>

                <div class="form-group">
                    <label for="pwd">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control" name="pass2" placeholder="Nhập lại mật khẩu...">
                </div>

                <button type="submit" class="btn btn-default" name="dangky">Đăng ký </button>
            </div>
        </div>
    </div>
</form>