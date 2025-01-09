<div class="portlet-title tabbable-line">
    <ul class="nav nav-tabs" style="justify-content: flex-end; display: flex;">
         
        <li class="{{ Request::is('insurance_policies') ? 'active' : '' }}">
            <a href="{{ url('insurance_policies') }}" 
               style="background-color: {{ Request::is('insurance_policies') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('insurance_policies') ? '#fff' : '#000' }};">All Policies</a>
        </li>
        <li class="{{ Request::is('active-policies') ? 'active' : '' }}">
            <a href="{{ url('active-policies') }}" 
               style="background-color: {{ Request::is('active-policies') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('active-policies') ? '#fff' : '#000' }};">Active Policies</a>
        </li>
       
        <li class="{{ Request::is('inactive-policies') ? 'active' : '' }}">
            <a href="{{ url('inactive-policies') }}" 
               style="background-color: {{ Request::is('inactive-policies') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('inactive-policies') ? '#fff' : '#000' }};">Inactive Policies</a>
        </li>

        <li class="{{ Request::is('expired-policies') ? 'active' : '' }}">
            <a href="{{ url('expired-policies') }}" 
               style="background-color: {{ Request::is('expired-policies') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('expired-policies') ? '#fff' : '#000' }};">Expired Policies</a>
        </li>
       
            
    </ul>
</div>