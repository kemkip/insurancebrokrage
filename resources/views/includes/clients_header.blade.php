<div class="portlet-title tabbable-line">
    <ul class="nav nav-tabs" style="justify-content: flex-end; display: flex;">
         
        <li class="{{ Request::is('clients') ? 'active' : '' }}">
            <a href="{{ url('clients') }}" 
               style="background-color: {{ Request::is('clients') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('clients') ? '#fff' : '#000' }};">All Clients</a>
        </li>
        <li class="{{ Request::is('open-clients') ? 'active' : '' }}">
            <a href="{{ url('open-clients') }}" 
               style="background-color: {{ Request::is('open-clients') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('open-clients') ? '#fff' : '#000' }};">Active Clents</a>
        </li>
       
        <li class="{{ Request::is('closed-clients') ? 'active' : '' }}">
            <a href="{{ url('closed-clients') }}" 
               style="background-color: {{ Request::is('closed-clients') ? '#1AB394' : 'transparent' }}; color: {{ Request::is('closed-clients') ? '#fff' : '#000' }};">Closed Clients</a>
        </li>
       
            
    </ul>
</div>