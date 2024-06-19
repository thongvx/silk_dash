@extends('dashboard.layouts.app')

@section('content')
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class=" grid grid-cols-1 lg:grid-cols-2 gap-6 lg:col-span-3">
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>User watching</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            2000
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Today earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Yesterday earning</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card1 -->
            <div class="xl:mb-0">
                <div
                    class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                    <div class='flex items-center justify-between py-2.5'>
                        <h3 class='text-lg text-slate-400'>Total Withdrawals</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white">
                            $ 0
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- card1 -->
        <div class="xl:mb-0 lg:col-span-1">
            <div
                class='bg-[#121520] rounded-3xl py-2 px-5 shadow-gray-600/30 dark:shadow-slate-900'>
                <div class='flex flex-col items-center justify-center py-2.5'>
                    <div class='font-semibold text-center'>
                        <h3 class='text-lg text-slate-400'>Total balance</h3>
                        <h5 class="mb-0 font-bold text-2xl text-white mt-3">
                            $ 0.00
                        </h5>
                    </div>
                    <button class="button-payout px-4 py-2 rounded-3xl bg-[#142132] hover:bg-[#009FB2] text-white mt-6"
                            report>Request payout
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white mt-3 lg:mt-0 pb-4">
        <div class="py-6">
            <form class="grid grid-cols-3 gap-x-8 font-bold flex-col justify-center items-center h-full" id="get-data-report">
                <div class="col-span-full">
                    <button type="submit" class="px-6 py-1 rounded-lg bg-[#121520] hover:bg-[#009fb2]"
                            data-start-date="{{ date('Y-m-d', strtotime('-1 day')) }}"
                            data-end-date="{{ date('Y-m-d', strtotime('-1 day')) }}" btn-date-report>Yesterday</button>
                    <button type="submit" class="px-6 py-1 rounded-lg bg-[#121520] hover:bg-[#009fb2]"
                            data-start-date="{{ date('Y-m-d') }}"
                            data-end-date="{{ date('Y-m-d') }}" btn-date-report>Today</button>
                    <button type="submit" class="px-6 py-1 rounded-lg bg-[#121520] hover:bg-[#009fb2]"
                            data-start-date="{{ date('Y-m-d') }}"
                            data-end-date="{{ date('Y-m-d', strtotime('-7 day')) }}" btn-date-report>7 days</button>
                    <button type="submit" class="px-6 py-1 rounded-lg bg-[#121520] hover:bg-[#009fb2]"
                            data-start-date="{{ date('Y-m-d') }}"
                            data-end-date="{{ date('Y-m-d', strtotime('-30 day')) }}" btn-date-report>30 days</button>
                </div>
                <div class="col-span-full lg:col-span-2 rounded-lg mt-3 flex">
                    <div date-rangepicker class="w-full flex items-center flex-row">
                        <div class="w-full flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="startDate" type="text" autocomplete="off" class="bg-[#121520] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                            </div>
                        </div>
                        <span class="mx-3">-</span>
                        <div class="w-full flex items-center lg:mt-0">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="endDate" type="text" autocomplete="off" class="bg-[#121520] placeholder:text-gray-500 text-white text-sm rounded-lg outline-none
                                 focus:ring-blue-500 block w-full ps-10 p-2.5" placeholder="Select date end">
                            </div>
                        </div>
                        <button class="ml-3 px-6 py-2 rounded-lg bg-[#121520] hover:bg-[#009fb2]">Apply</button>
                    </div>
                </div>
                <div class="col-span-full lg:col-span-1 rounded-lg">
                    <div class="flex items-center mt-2 w-full">
                        <h4 class="mr-4">Country</h4>
                        <select class="select2 w-full" multiple="multiple" data-placeholder="Select country">
                            <option value="AF"> Afghanistan(AF) </option>
                            <option value="AL"> Albania(AL) </option>
                            <option value="DZ"> Algeria(DZ) </option>
                            <option value="AD"> Andorra(AD) </option>
                            <option value="AO"> Angola(AO) </option>
                            <option value="AG"> Antigua and Barbuda(AG) </option>
                            <option value="AR"> Argentina(AR) </option>
                            <option value="AM"> Armenia(AM) </option>
                            <option value="AU"> Australia(AU) </option>
                            <option value="AT"> Austria(AT) </option>
                            <option value="AZ"> Azerbaijan(AZ) </option>
                            <option value="BS"> Bahamas(BS) </option>
                            <option value="BH"> Bahrain(BH) </option>
                            <option value="BD"> Bangladesh(BD) </option>
                            <option value="BB"> Barbados(BB) </option>
                            <option value="BY"> Belarus(BY) </option>
                            <option value="BE"> Belgium(BE) </option>
                            <option value="BZ"> Belize(BZ) </option>
                            <option value="BJ"> Benin(BJ) </option>
                            <option value="BT"> Bhutan(BT) </option>
                            <option value="BO"> Bolivia(BO) </option>
                            <option value="BA"> Bosnia and Herzegovina(BA) </option>
                            <option value="BW"> Botswana(BW) </option>
                            <option value="BR"> Brazil(BR) </option>
                            <option value="BN"> Brunei(BN) </option>
                            <option value="BG"> Bulgaria(BG) </option>
                            <option value="BF"> Burkina Faso(BF) </option>
                            <option value="BI"> Burundi(BI) </option>
                            <option value="CV"> Cabo Verde(CV) </option>
                            <option value="KH"> Cambodia(KH) </option>
                            <option value="CM"> Cameroon(CM) </option>
                            <option value="CA"> Canada(CA) </option>
                            <option value="CF"> Central African Republic(CF) </option>
                            <option value="TD"> Chad(TD) </option>
                            <option value="CL"> Chile(CL) </option>
                            <option value="CN"> China(CN) </option>
                            <option value="CO"> Colombia(CO) </option>
                            <option value="KM"> Comoros(KM) </option>
                            <option value="CD"> Congo, Democratic Republic of the(CD) </option>
                            <option value="CG"> Congo, Republic of the(CG) </option>
                            <option value="CR"> Costa Rica(CR) </option>
                            <option value="HR"> Croatia(HR) </option>
                            <option value="CU"> Cuba(CU) </option>
                            <option value="CY"> Cyprus(CY) </option>
                            <option value="CZ"> Czech Republic(CZ) </option>
                            <option value="DK"> Denmark(DK) </option>
                            <option value="DJ"> Djibouti(DJ) </option>
                            <option value="DM"> Dominica(DM) </option>
                            <option value="DO"> Dominican Republic(DO) </option>
                            <option value="EC"> Ecuador(EC) </option>
                            <option value="EG"> Egypt(EG) </option>
                            <option value="SV"> El Salvador(SV) </option>
                            <option value="GQ"> Equatorial Guinea(GQ) </option>
                            <option value="ER"> Eritrea(ER) </option>
                            <option value="EE"> Estonia(EE) </option>
                            <option value="SZ"> Eswatini(SZ) </option>
                            <option value="ET"> Ethiopia(ET) </option>
                            <option value="FJ"> Fiji(FJ) </option>
                            <option value="FI"> Finland(FI) </option>
                            <option value="FR"> France(FR) </option>
                            <option value="GA"> Gabon(GA) </option>
                            <option value="GM"> Gambia(GM) </option>
                            <option value="GE"> Georgia(GE) </option>
                            <option value="DE"> Germany(DE) </option>
                            <option value="GH"> Ghana(GH) </option>
                            <option value="GR"> Greece(GR) </option>
                            <option value="GD"> Grenada(GD) </option>
                            <option value="GT"> Guatemala(GT) </option>
                            <option value="GN"> Guinea(GN) </option>
                            <option value="GW"> Guinea-Bissau(GW) </option>
                            <option value="GY"> Guyana(GY) </option>
                            <option value="HT"> Haiti(HT) </option>
                            <option value="HN"> Honduras(HN) </option>
                            <option value="HU"> Hungary(HU) </option>
                            <option value="IS"> Iceland(IS) </option>
                            <option value="IN"> India(IN) </option>
                            <option value="ID"> Indonesia(ID) </option>
                            <option value="IR"> Iran(IR) </option>
                            <option value="IQ"> Iraq(IQ) </option>
                            <option value="IE"> Ireland(IE) </option>
                            <option value="IL"> Israel(IL) </option>
                            <option value="IT"> Italy(IT) </option>
                            <option value="JM"> Jamaica(JM) </option>
                            <option value="JP"> Japan(JP) </option>
                            <option value="JO"> Jordan(JO) </option>
                            <option value="KZ"> Kazakhstan(KZ) </option>
                            <option value="KE"> Kenya(KE) </option>
                            <option value="KI"> Kiribati(KI) </option>
                            <option value="KP"> Korea, North(KP) </option>
                            <option value="KR"> Korea, South(KR) </option>
                            <option value="XK"> Kosovo(XK) </option>
                            <option value="KW"> Kuwait(KW) </option>
                            <option value="KG"> Kyrgyzstan(KG) </option>
                            <option value="LA"> Laos(LA) </option>
                            <option value="LV"> Latvia(LV) </option>
                            <option value="LB"> Lebanon(LB) </option>
                            <option value="LS"> Lesotho(LS) </option>
                            <option value="LR"> Liberia(LR) </option>
                            <option value="LY"> Libya(LY) </option>
                            <option value="LI"> Liechtenstein(LI) </option>
                            <option value="LT"> Lithuania(LT) </option>
                            <option value="LU"> Luxembourg(LU) </option>
                            <option value="MG"> Madagascar(MG) </option>
                            <option value="MW"> Malawi(MW) </option>
                            <option value="MY"> Malaysia(MY) </option>
                            <option value="MV"> Maldives(MV) </option>
                            <option value="ML"> Mali(ML) </option>
                            <option value="MT"> Malta(MT) </option>
                            <option value="MH"> Marshall Islands(MH) </option>
                            <option value="MR"> Mauritania(MR) </option>
                            <option value="MU"> Mauritius(MU) </option>
                            <option value="MX"> Mexico(MX) </option>
                            <option value="FM"> Micronesia(FM) </option>
                            <option value="MD"> Moldova(MD) </option>
                            <option value="MC"> Monaco(MC) </option>
                            <option value="MN"> Mongolia(MN) </option>
                            <option value="ME"> Montenegro(ME) </option>
                            <option value="MA"> Morocco(MA) </option>
                            <option value="MZ"> Mozambique(MZ) </option>
                            <option value="MM"> Myanmar(Burma)(MM) </option>
                            <option value="NA"> Namibia(NA) </option>
                            <option value="NR"> Nauru(NR) </option>
                            <option value="NP"> Nepal(NP) </option>
                            <option value="NL"> Netherlands(NL) </option>
                            <option value="NZ"> New Zealand(NZ) </option>
                            <option value="NI"> Nicaragua(NI) </option>
                            <option value="NE"> Niger(NE) </option>
                            <option value="NG"> Nigeria(NG) </option>
                            <option value="MK"> North Macedonia(MK) </option>
                            <option value="NO"> Norway(NO) </option>
                            <option value="OM"> Oman(OM) </option>
                            <option value="PK"> Pakistan(PK) </option>
                            <option value="PW"> Palau(PW) </option>
                            <option value="PA"> Panama(PA) </option>
                            <option value="PG"> Papua New Guinea(PG) </option>
                            <option value="PY"> Paraguay(PY) </option>
                            <option value="PE"> Peru(PE) </option>
                            <option value="PH"> Philippines(PH) </option>
                            <option value="PL"> Poland(PL) </option>
                            <option value="PT"> Portugal(PT) </option>
                            <option value="QA"> Qatar(QA) </option>
                            <option value="RO"> Romania(RO) </option>
                            <option value="RU"> Russia(RU) </option>
                            <option value="RW"> Rwanda(RW) </option>
                            <option value="KN"> Saint Kitts and Nevis(KN) </option>
                            <option value="LC"> Saint Lucia(LC) </option>
                            <option value="VC"> Saint Vincent and the Grenadines(VC) </option>
                            <option value="WS"> Samoa(WS) </option>
                            <option value="SM"> San Marino(SM) </option>
                            <option value="ST"> Sao Tome and Principe(ST) </option>
                            <option value="SA"> Saudi Arabia(SA) </option>
                            <option value="SN"> Senegal(SN) </option>
                            <option value="RS"> Serbia(RS) </option>
                            <option value="SC"> Seychelles(SC) </option>
                            <option value="SL"> Sierra Leone(SL) </option>
                            <option value="SG"> Singapore(SG) </option>
                            <option value="SK"> Slovakia(SK) </option>
                            <option value="SI"> Slovenia(SI) </option>
                            <option value="SB"> Solomon Islands(SB) </option>
                            <option value="SO"> Somalia(SO) </option>
                            <option value="ZA"> South Africa(ZA) </option>
                            <option value="SS"> South Sudan(SS) </option>
                            <option value="ES"> Spain(ES) </option>
                            <option value="LK"> Sri Lanka(LK) </option>
                            <option value="SD"> Sudan(SD) </option>
                            <option value="SR"> Suriname(SR) </option>
                            <option value="SE"> Sweden(SE) </option>
                            <option value="CH"> Switzerland(CH) </option>
                            <option value="SY"> Syria(SY) </option>
                            <option value="TW"> Taiwan(TW) </option>
                            <option value="TJ"> Tajikistan(TJ) </option>
                            <option value="TZ"> Tanzania(TZ) </option>
                            <option value="TH"> Thailand(TH) </option>
                            <option value="TL"> Timor-Leste(TL) </option>
                            <option value="TG"> Togo(TG) </option>
                            <option value="TO"> Tonga(TO) </option>
                            <option value="TT"> Trinidad and Tobago(TT) </option>
                            <option value="TN"> Tunisia(TN) </option>
                            <option value="TR"> Turkey(TR) </option>
                            <option value="TM"> Turkmenistan(TM) </option>
                            <option value="TV"> Tuvalu(TV) </option>
                            <option value="UG"> Uganda(UG) </option>
                            <option value="UA"> Ukraine(UA) </option>
                            <option value="AE"> United Arab Emirates(AE) </option>
                            <option value="GB"> United Kingdom(GB) </option>
                            <option value="US"> United States(US) </option>
                            <option value="UY"> Uruguay(UY) </option>
                            <option value="UZ"> Uzbekistan(UZ) </option>
                            <option value="VU"> Vanuatu(VU) </option>
                            <option value="VA"> Vatican City(VA) </option>
                            <option value="VE"> Venezuela(VE) </option>
                            <option value="VN"> Vietnam(VN) </option>
                            <option value="YE"> Yemen(YE) </option>
                            <option value="ZM"> Zambia(ZM) </option>
                            <option value="ZW"> Zimbabwe(ZW) </option>
                        </select>
                    </div>
                </div>
        </form>
        <div class="grid col-span-full mt-4" box-lifted>
            <div
                class="tabs tabs-lifted z-10 -mb-[var(--tab-border)] justify-self-start grid flex-col items-start">
                <button
                    class="date-table tab-lifted text-white tab-active !text-[#009FB2]  hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-lg px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="date-table">
                    Date
                </button>
                <button
                    class="country-table tab-lifted text-white hover:text-[#009FB2] tab-export [--tab-border-color:#121520] tab font-bold
                    h-auto text-lg px-4 [--tab-bg:#121520] !border-b-0 md:!border-b-1 !rounded-b-lg md:!rounded-b-none before:!hidden md:before:!block"
                    data-content="country-table">
                   Country
                </button>
            </div>
            <div class="rounded-b-xl rounded-tr-xl relative bg-[#121520] grid" id="box-content">
                @include('dashboard.report.'.request()->get('tab', 'date-table'))
            </div>
        </div>
    </div>
    <div class="text-white bg-[#121520] mt-6 rounded-lg p-4">
        @include('dashboard.report.payment')
    </div>

    <div fixed-payout>
        <!-- -right-90 in loc de 0-->
        <div fixed-payout-card
             class="opacity-0 hidden bg-black/20 z-50 shadow-3xl w-screen ease fixed top-0 left-0 flex h-full  backdrop-blur-sm
           min-w-0 flex-col break-words rounded-none border-0 bg-clip-border duration-200 justify-center items-center px-3">
            <div class="absolute h-full w-full fixed-plugin-close-button z-10" fixed-payout-close-button>
            </div>
            <div
                class="w-11/12 sm:w-4/5 xl:w-2/5 bg-[#121520] z-20 py-4 px-3 rounded-lg relative shadow-lg shadow-slate-900">
                <div class="absolute right-4 top-3">
                    <button fixed-payout-close-button
                            class="inline-block p-0 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
                        <i class="fa fa-close text-xl"></i>
                    </button>
                </div>
                <div>
                    <div class="payout" id="payout">
                        <h5 class="mb-0 text-[#009FB2] text-lg font-semibold">Request Payout</h5>
                        <h5 class="text-center text-white">
                            *Min payout: $100<br>
                            (We only pay via USDT - we do not charge any network fees)
                        </h5>
                        <div class="text-white mt-3 flex justify-between items-center">
                            <h5>
                                Your USDT Address: aaaaaaaaaaaaaa<br>
                                Network: Ethereum
                            </h5>
                            <a href="" class="rounded-xl bg-blue-400 px-5 py-2 h-max">Change</a>
                        </div>
                        <form class="text-white mt-3 flex justify-between">
                            <div class="bg-[#142132] rounded-lg flex w-full px-3 items-center">
                                <label for="amount" class="mr-3">
                                    Amount:
                                </label>
                                <input type="number" min="100" max="2000" name="amount" id="amount"
                                       class="w-full bg-transparent focus:shadow-primary-outline py-2 pr-3 placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                       placeholder="100"/>
                                <h5>
                                    USD
                                </h5>
                            </div>
                            <button class="bg-green-300 rounded-xl px-5 py-2 h-max ml-3 hover:bg-green-500" disabled>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

