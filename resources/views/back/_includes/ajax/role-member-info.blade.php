<ul class="list-group mb-3">
    <li class="list-group-item mb-1">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.name_ar")}}:
        </strong>
        <span></i> {{ $role->name_ar }}</span>
    </li>
    <li class="list-group-item mb-1">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.name_fr")}}:
        </strong>
        <span></i> {{ $role->name_fr }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-dollar-sign gap-1"></i>
            {{__("members.salary")}}:
        </strong>
        <span></i> {{ $role->salary }} {{ __('global.mad_currency') }}</span>
    </li>
</ul>

