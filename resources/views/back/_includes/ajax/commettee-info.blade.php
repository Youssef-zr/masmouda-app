<style>
    .list-group-item strong{
        min-width: 160px
    }
</style>

<ul class="list-group mb-3">
    <li class="list-group-item mb-1 d-flex">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.name_ar")}}:
        </strong>
        <span style="direction:rtl"></i> {{ $committee->name_ar }}</span>
    </li>
    <li class="list-group-item mb-1 d-flex">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.name_fr")}}:
        </strong>
        <span></i> {{ $committee->name_fr }}</span>
    </li>
    <li class="list-group-item mb-1 d-flex">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.description_ar")}}:
        </strong>
        <span style="direction:rtl"></i> {{ $committee->description_ar }}</span>
    </li>
    <li class="list-group-item mb-1 d-flex">
        <strong>
            <i class="fa fa-user gap-1"></i>
            {{__("members.description_fr")}}:
        </strong>
        <span></i> {{ $committee->description_fr }}</span>
    </li>
</ul>

