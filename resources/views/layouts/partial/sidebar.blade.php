<div class="logo">
    Restaurant Management System
</div>
<div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{Request::is('admin/dashboard*')? 'active':''}}">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/table*') ? 'active': ''}}">
                        <a href="{{ route('table.index') }}">
                            <i class="material-icons">slideshow</i>
                            <p>Slider</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/category*') ? 'active': ''}}">
                        <a href="{{ route('category.index') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/item*') ? 'active': ''}}">
                        <a href="{{ route('item.index') }}">
                            <i class="material-icons">library_books</i>
                            <p>Items</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/reservation*') ? 'active': ''}}">
                        <a href="{{ route('reservation.index') }}">
                            <i class="material-icons">chrome_reader_mode</i>
                            <p>Reservations</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/supplier*') ? 'active': ''}}">
                        <a href="{{ route('supplier.index') }}">
                            <i class="material-icons">play_for_work</i>
                            <p>Supplier</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/purchase*') ? 'active': ''}}">
                        <a href="{{ route('purchase.index') }}">
                            <i class="material-icons">add_shopping_cart</i>
                            <p>Purchase</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/order*') ? 'active': ''}}">
                        <a href="{{ route('order.index') }}">
                            <i class="material-icons">reorder</i>
                            <p>Orders</p>
                        </a>
                    </li>


                    <li class="{{ Request::is('admin/tinfo*') ? 'active': ''}}">
                        <a href="{{ route('tinfo.index') }}">
                            <i class="material-icons">table</i>
                            <p>Tables</p>
                        </a>
                    </li>

                     <li class="{{ Request::is('admin/contacts*') ? 'active': ''}}">
                        <a href="{{ route('contacts.index') }}">
                            <i class="material-icons">message</i>
                            <p>Contact Messages</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/employee*') ? 'active': ''}}">
                        <a href="{{ route('employee.index') }}">
                            <i class="material-icons">info</i>
                            <p>Employees</p>
                        </a>
                    </li>

                     <li class="{{ Request::is('admin/summery*') ? 'active': ''}}">
                        <a href="{{ route('summery.index') }}">
                            <i class="material-icons">report</i>
                            <p>Summery</p>
                        </a>
                    </li>


                    

                    
                    
                    <!--li>
                        <a href="./icons.html">
                            <i class="material-icons">bubble_chart</i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="./maps.html">
                            <i class="material-icons">location_on</i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="./notifications.html">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="upgrade.html">
                            <i class="material-icons">unarchive</i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li-->
                </ul>
            </div>