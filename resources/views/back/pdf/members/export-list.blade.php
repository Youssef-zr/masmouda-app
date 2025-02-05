<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __("members.members_list") }}</title>
    <meta charset="UTF-8">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'cairo', sans-serif !important;
            font-size: 16.5px;
            line-height: 0.9;
            padding: 15px 30px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #1e272e;
            border-collapse: collapse;
            font-family: 'cairo', sans-serif;
        }

        .table-permissions {
            border: 1px solid #34495e;
        }

        .table-permissions tbody td {
            border: none;
            border-bottom: 1px solid #34495e;
        }

        .table tr th {
            text-align: left;
        }

        .table .table-title {
            font-size: 30px;
        }

        .table th,
        .table td {
            padding: .80rem;
            vertical-align: top;
            border: 1px solid #34495e;
        }


        .bg-gray {
            background-color: #34495e;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .mt-5 {
            margin-top: 35px;
        }

        .pt-5 {
            padding-top: 45px;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .french-text {
            line-height: 5px;
        }

        .arabic-text {
            direction: rtl !important;
            text-align: right;
        }

        .text-spacing {
            letter-spacing: 1px;
        }

        .header {
            margin-bottom: 50px;
            padding: .06rem .80rem
        }

        .mt-4 {
            margin-top: 20px;
        }

        .container {}
    </style>
</head>

<body>

    @if($members->count()>0)
    @foreach ($members as $member)
    <div class="container" style="height:842px">
        <div class="header bg-gray">
            <p class="header-item">
                <strong class="text-capitalize">{{ __("global.rural_commune") }}</strong>
                <span> ( {{ env("APP_NAME") }})</span>
            </p>
            <p id="header-item">
                <strong class="text-capitalize" style="margin-right: 8px;">{{ __("global.fiscal_year") }}</strong>
                <span>({{$member->created_at->format("Y")}})</span>
            </p>
        </div>

        <table class="table table-striped">
            <tr>
                <td colspan="2" class="bg-gray">
                    <h3 class="text-spacing text-capitalize">
                        <span>{{ __("members.member_info") }}</span>
                        ({{$member->name}})
                    </h3>
                </td>
            </tr>
            <tr>
                <th>{{ __("members.name") }} </th>
                <td>{{ $member->name }}</td>
            </tr>
            <tr>
                <th>{{ __("members.email") }} </th>
                <td>{{ $member->email }}</td>
            </tr>
            <tr>
                <th>{{ __("members.phone") }} </th>
                <td>{{ $member->phone }}</td>
            </tr>
            <tr>
                <th>{{ __("members.adress") }} </th>
                <td>{{ $member->adress }}</td>
            </tr>
            <tr>
                <th>{{ __("members.cin_number") }} </th>
                <td class="text-uppercase">{{ $member->cin_number }}</td>
            </tr>
            <tr>
                <th>{{ __("members.bank_name") }} </th>
                <td>{{ $member->bank_name }}</td>
            </tr>
            <tr>
                <th>{{ __("members.rib_number") }} </th>
                <td>{{ $member->formatedRibNumber }}</td>
            </tr>
            <tr>
                <th>{{ __("members.political_party") }} </th>
                <td>
                    <span>{{ $member->political_party }}</span>
                </td>
            </tr>
            <tr>
                <th>{{ __("members.role_name") }} </th>
                <td>
                    <p>
                        <span>{{ $member->role->name_fr }}</span> |
                        <span>{{ $member->role->name_ar }}</span>
                    </p>
                </td>
            </tr>
            <tr>
                <th>
                    {{ __("members.salary") }}
                    ({{ __("members.monthly")}})
                </th>
                <td>
                    {{ $member->role->salary }}
                    {{ __("global.mad_currency")}}
                </td>
            </tr>
            <tr>
                <th>
                    {{ __("members.salary") }}
                    ({{ __("members.yearly")}})
                </th>
                <td>
                    {{ $member->amount }}
                    {{ __("global.mad_currency")}}
                </td>
            </tr>
        </table>

        @if ($member->rolePermissions)
        <table class="table table-striped mt-4 table-permissions">
            <tr>
                <th class="bg-gray" colspan="2">
                    <h4 class="text-spacing text-capitalize">
                        {{ __("members.role_permissions") }}
                        ({{ $member->role->name_fr }})
                    </h4>
                </th>
            </tr>
            @foreach ($member->rolePermissions as $permission)
            <tbody>
                <tr>
                    <td>
                        @if ($permission['fr'])
                        <p class="french-text">
                            - {{ $permission['fr'] }}
                        </p>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        @if ($permission['ar'])
                        <p class="arabic-text" style="direction: rtl;text-align:right;margin-top:5px">
                            {{ $permission['ar'] }} -
                        </p>
                        @endif
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
    </div>
    @endforeach
    @endif
</body>

</html>
