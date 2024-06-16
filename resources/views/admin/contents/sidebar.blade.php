<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{asset('admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Synadmin</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li class="menu-label">Dashboard</li>

            <li>
                <a href="{{route('admin.index')}}">
                    <div class="parent-icon"><i class='bx bx-home'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Ecommerce</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-spa' ></i>
                    </div>
                    <div class="menu-title">Product</div>
                </a>
                <ul>
                    <li> <a href="{{route('category.list')}}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                    </li>
                    <li> <a href="{{route('subcategory.list')}}"><i class="bx bx-right-arrow-alt"></i>Sub Category</a>
                    </li>
                    <li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add New Product</a>
                    </li>
                    <li> <a href="{{route('product.list')}}"><i class="bx bx-right-arrow-alt"></i>Products List</a>
                    </li>
                    
                </ul>
            </li>
            
            
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-certification' ></i>
                    </div>
                    <div class="menu-title">Brand</div>
                </a>
                <ul>
                    <li> <a href="{{route('list.brands')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                    </li>
                    <li> <a href="javascript:;"><i class="bx bx-right-arrow-alt"></i>Brands List</a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-gift'></i>
                    </div>
                    <div class="menu-title">Orders</div>
                </a>
                <ul>
                    <li> <a href="{{route('order.list')}}"><i class="bx bx-right-arrow-alt"></i>Orders List</a>
                    </li>            
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-notepad' ></i>
                    </div>
                    <div class="menu-title">Reports</div>
                </a>
                <ul>
                    <li> <a href="{{route('in.stock')}}"><i class="bx bx-right-arrow-alt"></i>In Stock</a>
                    </li>
                    <li> <a href="{{route('outof.stock')}}"><i class="bx bx-right-arrow-alt"></i>Out Of Stock</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-square' ></i>
                    </div>
                    <div class="menu-title">Banner</div>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-purchase-tag' ></i>
                    </div>
                    <div class="menu-title">Coupons</div>
                </a>                
            </li>
            <li class="menu-label">App Settings</li>
            
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-cog' ></i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul>
                    <li> <a href="{{route('app.setting')}}"><i class="bx bx-right-arrow-alt"></i>Business Setup</a>
                    </li>
                    <li> <a href="{{route('payment.method')}}"><i class="bx bx-right-arrow-alt"></i>Payment Method</a>
                    </li>
                    <li> <a href="{{route('terms.setting')}}"><i class="bx bx-right-arrow-alt"></i>Terms & Conditions</a>
                    </li>
                    <li> <a href="{{route('support.policy')}}"><i class="bx bx-right-arrow-alt"></i>Support Policy</a>
                    </li>
                    <li> <a href="{{route('privacy.policy')}}"><i class="bx bx-right-arrow-alt"></i>privacy Policy</a>
                    </li>
                    <li> <a href="{{route('return.policy')}}"><i class="bx bx-right-arrow-alt"></i>Return Policy</a>
                    </li>   
                    <li> <a href="{{route('edit.about')}}"><i class="bx bx-right-arrow-alt"></i>About Us</a>
                    </li>
                </ul>
                
            </li>   
            <li class="menu-label">Maintenance</li>
            <li>
                <a href="{{route('app.main')}}">
                    <div class="parent-icon"><i class='bx bx-wrench' ></i>
                    </div>  
                    <div class="menu-title">Maintenance Mode</div>
                </a>                
            </li>         
        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->