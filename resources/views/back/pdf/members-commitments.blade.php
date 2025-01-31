<!DOCTYPE html>
<html lang="en" dir="{{ app()->getLocale() == 'ar' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __("members.members_commitments_list") }}</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "cairo", 'Times New Roman', Times, serif;
            font-size: 16px;            
        }

        h2.title {
            margin-top: 100px
        }

        .paragraph {
            margin-bottom: 5px;
            font-size: 1rem;
            line-height: 1
        }

        .text-content {
            margin-top: 15px;
            margin-bottom: 50px;
            font-size: 1.2rem
        }

        .commitment-item {}
    </style>
</head>

<body>

    <div class="container">
        <div class="commitments">

            @if($members->count()>0)
            @foreach ($members as $member )
            <div class="commitment-item" style="height:800px">
                <div class="header">
                    <p class="paragraph" dir="rtl">
                        التاريخ: {{ now()->format("Y/m/d") }}
                    </p>
                    <p class="paragraph">الاسم الكامل: <span>{{$member->name}}</span></p>
                    <p class="paragraph">رقم بطاقة التعريف الوطنية: <span>{{ $member->cin_number }}</span></p>
                    <p class="paragraph">رقم الحساب البنكي: <span dir="ltr">{{ $member->formatedRibNumber }}</span></p>
                </div>

                <h2 class="title">الموضوع: التزام بصحة المعلومات الشخصية</h2>

                <p class='text-content'>
                انا الموقع أسفله
                    أقر وأتعهد بموجب هذا التزامي، بأن جميع المعلومات التي قدمتها هي صحيحة ودقيقة. كما ألتزم بإعلام الجهات المعنية في حال حدوث أي تغيير في هذه البيانات، وأتحمل المسؤولية الكاملة في حال اكتشاف أي تزوير أو خطأ في المعلومات المقدمة.
                </p>
                <p>الامضاء: ____________</p>

            </div>
            @endforeach
            @endif

        </div>
    </div>

</body>

</html>