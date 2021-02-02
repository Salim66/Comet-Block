<div class="shop-menu">
    <div class="row">
        <div class="col-sm-4">
            <h6 class="upper">Displaying 6 of 18 results</h6>
        </div>
        <div class="col-sm-4">
            <form action="{{ route('search.product.price') }}" method="POST">
                @csrf
                <div class="input-group">
                    <select name="price" class="form-control" style=" -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                        <option selected="selected" value="">Select Price</option>
                        <option value="0:500">0_____500</option>
                        <option value="501:1000">501_____1000</option>
                        <option value="1001:1500">1001_____1500</option>
                        <option value="1501:2000">1501_____2000</option>
                        <option value="2001:2500">2001_____2500</option>
                        <option value="2501:3000">2501_____3000</option>
                        <option value="3001:3500">3001_____3500</option>
                        <option value="3501:4000">3501_____4000</option>
                        <option value="4001:5000">4001_____5000</option>
                        <option value="5001:6000">5001_____6000</option>
                        <option value="6001:7000">6001_____7000</option>
                        <option value="7001:8000">7001_____8000</option>
                        <option value="8001:9000">8001_____9000</option>
                        <option value="9001:10000">9001_____10000</option>
                    </select>
                    <span class="input-group-btn "><button name="range" type="submit"  class="btn btn-color d-inline-block pl-0 pr-1">Search</button></span>
                </div>
            </form>
        </div>
        <div class="col-sm-4">
            <div class="widget">
                <form action="{{ route('search.product') }}" method="POST">
                    @csrf
                    <input name="search" type="text" placeholder="Search.." class="form-control">
                </form>
            </div>
        </div>
    </div>
    <!-- end of row-->
</div>
