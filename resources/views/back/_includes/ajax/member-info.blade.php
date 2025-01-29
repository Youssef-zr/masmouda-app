<style>
    li strong:first-of-type {
        display: inline-block;
        width: 170px;
    }
</style>

<ul class="list-group mb-3">
    <li class="list-group-item">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.name")}}:
        </strong>
        <span></i> {{ $member->name }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-envelope gap-1"></i>
            {{__("members.email")}}:
        </strong>
        <span></i> {{ $member->email }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-mobile-screen-button gap-1"></i>
            {{__("members.phone")}}:
        </strong>
        <span></i> {{ $member->phone }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-map-pin gap-1"></i>
            {{__("members.adress")}}:
        </strong>
        <span></i> {{ $member->adress }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-address-card gap-1"></i>
            {{__("members.cin_number")}}:
        </strong>
        <span></i> {{ $member->cin_number }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-clipboard-list gap-1"></i>
            {{__("members.political_party")}}:
        </strong>
        <span></i> {{ $member->political_party }}</s>
    </li>
    <li class="list-group-item d-flex">
        <strong class="d-inline-block">
            <i class="fa fa-clipboard-list gap-1"></i>
            {{__("members.role_name")}}:
        </strong>
        <span class="text-left d-block">
             <span class="d-inline-block mx-2"></i> {{ $member->role->name_fr }}</span> |
             <span class="d-inline-block mx-2"></i> {{ $member->role->name_ar }}</span>
        </span>
    </li>
    <li class="list-group-item d-flex">
        <strong>
            <i class="fa fa-clipboard-list gap-1"></i>
            {{__("members.committee_name")}}:
        </strong>
       <p class="mb-0">
           <span></i> {{ $member->committee->name_fr }}</span> |
           <span></i> {{ $member->committee->name_ar }}</span>
        </p>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-credit-card gap-1"></i>
            {{__("members.rib_number")}}:
        </strong>
        <span></i> {{ $member->formatedRibNumber }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-university gap-1"></i>
            {{__("members.bank_name")}}:
        </strong>
        <span></i> {{ $member->bank_name }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-calendar-days gap-1"></i>
            {{__("members.month")}}:
        </strong>
        <span></i> {{ $member->month }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-dollar-sign gap-1"></i>
            {{__("members.salary")}}:
        </strong>
        <span></i> {{ $member->role->salary }} {{ __('global.mad_currency') }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-dollar-sign gap-1"></i>
            {{__("members.amount")}}:
        </strong>
        <span></i> {{ $member->amount }} {{ __("global.mad_currency") }} ({{ __("members.yearly") }})</span>
    </li>
</ul>

@if ($member->rolePermissions)
<div class="block block-rounded block-bordered block-primary mt-3">
    <div class="block-header block-header-default border-bottom">
        <h3 class="block-title">
            <i class="fa fa-list gap-2"></i>
            {{ __('members.permissions') }}
        </h3>
    </div>
    <div class="block-content pt-0">
        @foreach ($member->rolePermissions as $permission)
        <div class="row  py-3 {{ !$loop->last ?' border-bottom' :'' }}">
            <div class="col-6">
                <p class="mb-0">- {{ $permission['fr'] }}</p>
            </div>
            <div class="col-6">
                <p class="mb-0" style="direction: rtl;">- {{ $permission['ar'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
