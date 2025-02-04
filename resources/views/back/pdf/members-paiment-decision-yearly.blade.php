<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __("members.members_commitments_list_yearly") }}</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "cairo", 'Times New Roman', Times, serif;
            font-size: 16px;
            padding: 0px 35px;
        }

        .header {
            text-align: right;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .header .paragraph:last-of-type {
            padding-right: 15px
        }

        .header .paragraph {
            margin-bottom: 0;
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 21px;
        }

        .header .stars small {
            letter-spacing: 4px;
        }

        .content {
            margin-top: 20px
        }

        .content h1.title {
            text-align: center;
            font-size: 34px;
            margin-bottom: 30px;
        }

        .decision-container .title-container {
            text-align: center;
        }

        .decision-container .title-container .stars {
            letter-spacing: 1px
        }

        .decision-container .title {
            font-weight: 600;
            text-align: center;
            margin-bottom: 0;
            line-height: 0
        }

        .decision-container .decision {
            margin-bottom: 8px;
        }

        .decision-container .decision .sub-title {
            margin-bottom: 6px;
        }

        .decision-container .decision .sub-title span {
            text-decoration: underline;
        }

        .decision-container .decision .text {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .content .text-content {
            margin-bottom: 0px;
            font-size: 1.1rem;
            text-align: right;
            text-indent: 0;
            line-height: 1.6;
        }

        .content .text-content span {
            line-height: 5px;
        }

        .content .text-content.first {
            padding-right: 50px;
            padding-bottom: 0;
            margin-bottom: 0 !important;
            line-height: 10px;
        }

        .signature {
            font-size: 1.1rem;
            margin-top: 50px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        .text-underline {
            text-decoration: underline;
        }

        .signature {
            width: 250px;
            margin: 25px auto 0 0;
            text-align: center;
        }

        .signature p {
            line-height: 15px;
        }

        .signature p:first-of-type {
            direction: rtl;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="commitments">

            @if($members->count()>0)
            @foreach ($members as $member )
            <div class="commitment-item" style="height:800px">
                <ul class="header">
                    <li class="paragraph">
                        <small>المملكــة المغربية</small>
                    </li>
                    <li class="paragraph">
                        <small>وزارة الداخليـــــة</small>
                    </li>
                    <li class="paragraph">
                        <small>إقليــــــــــــم وزان</small>
                        </;>
                    <li class="paragraph">
                        <small>جماعة مصمودة</small>
                        </;>
                    <li class="paragraph stars">
                        <small>********</small>
                    </li>
                </ul>

                <div class="content">
                    <h1 class="title text-underline">قــــرار الالتزام بالنفقة</h1>

                    <p class='text-content first'>
                        إن رئيس المجلس الجماعي لمصمودة،
                    </p>

                    <p class='text-content'>
                        بناءً على القانون التنظيمي رقم 113.14 المتعلق بالجماعات، الصادر بتنفيذه الظهير الشريف رقم 1.15.85
                        الصادر في 20 من رمضان 1436 (7 يوليو 2015)،
                        خاصة المادتين 52 و219 منه.
                    </p>

                    <p class='text-content'>
                        بناءً على المرسوم رقم 2.16.493 الصادر في 4 محرم 1438 (6 أكتوبر 2016)،
                        بتحديد شروط منح التعويضات ومقاديرها لرؤساء مجالس الجماعات والمقاطعات ونوابهم، وكتاب مجالس الجماعات والمقاطعات ونوابهم، ورؤساء اللجان الدائمة ونوابهم.
                    </p>

                    <p class='text-content'>
                        بناءً على المرسوم رقم 2.17.451 الصادر في 4 ربيع الأول 1439 (23 نونبر 2017)،
                        بسن نظام للمحاسبة العمومية للجماعات ومؤسسات التعاون بين الجماعات.
                    </p>
                </div>

                <div class="decision-container">
                    <div class="title-container">
                        <h2 class="title">
                            يقرر ما يلي
                        </h2>
                        <span class="stars">*******</span>
                    </div>
                    <div class="decision">
                        <h3 class="sub-title">
                            <span>الفصل الأول</span>:
                        </h3>
                        <p class="text">
                            يتم الالتزام لفائدة السيد(ة) : {{$member->name}}
                            بصفته: {{ $member->role->name_ar }}
                            بنفقة قدرها: {{ $member->amount }} درهم،
                            في حسابه(ا) البنكي رقم: <span dir="ltr">{{ $member->formatedRibNumber }}</span>
                            كتعويض عن سنة {{ now()->format("Y") }}.
                        </p>
                    </div>
                    <div class="decision">
                        <h3 class="sub-title">
                            <span>الفصل الثاني</span>:
                        </h3>
                        <p class="text">
                            يُعهد بتنفيذ هذا القرار إلى السيد قابض قباضة وزان.
                        </p>
                    </div>
                </div>

                <div class="signature">
                    <p class="date">
                        <strong>
                            مصمــودة في:
                            {{ now()->format("Y/m/d") }}
                        </strong>
                    </p>
                    <p>
                        <strong>الـــرئيس</strong>
                    </p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

</body>

</html>