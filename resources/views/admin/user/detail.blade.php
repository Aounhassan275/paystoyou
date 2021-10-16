@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>USER DETAIL | PAYS TO YOU</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-xl-3">
        
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">User Details</h5>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title mb-0">{{$user->name}}</h5>
                <div class="text-muted mb-2">
                @if ($user->checkstatus() =='old')
                        <span class="badge badge-success">Active User</span>                            
                        @elseif($user->checkstatus() =='expired')
                        <span class="badge badge-primary">Expired User</span>  
                        @else
                                                <span class="badge badge-danger">Pending User</span>                                                      
                        @endif</div>
                @if ($user->status == 'block')
                <div>
                    <a class="btn btn-success btn-sm" href="{{route('admin.user.activation',$user->id)}}">Active</a>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.delete',$user->id)}}">Delete</a>
                </div>
                @else
                <div>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.block',$user->id)}}">Block</a>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.delete',$user->id)}}">Delete</a>
                </div>
                @endif
            </div>
            <hr class="my-0">
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-danger" data-feather="dollar-sign"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">PKR {{$user->balance}}</h3>
                                <div class="mb-0">User Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Settings</h5>
            </div>
            <div class="list-group list-group-flush" role="tablist">
                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                Update Profile
                </a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                Deposit
                </a>   
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#draw" role="tab">
                Withdraw
                </a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#donation" role="tab">
                    Donation
                </a>  
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#referral" role="tab">
                    User Referral
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-9">
        @if ($user->package)
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-primary" data-feather="activity"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->package->name}}</h3>
                                <div class="mb-0">Package Subcription</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-warning" data-feather="calendar"></i>
        
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->packageExpires()->format('d M,Y')}}</h3>
                                <div class="mb-0">Package Expire</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl  d-xxl-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-info" data-feather="aperture"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{Carbon\Carbon::today()->diffInDays($user->a_date)}}</h3>
                                <div class="mb-0">Packages Days</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        @endif
        <div class="tab-content">
            <div class="tab-pane fade show active" id="account" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Private info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.user.update')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <label for="inputFirstName">User name</label>
                                <input type="text" class="form-control" name="name" id="inputFirstName" value="{{$user->name}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputLastName">Full Name</label>
                                    <input type="text" class="form-control" name="fname"  value="{{$user->fname}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Phone#</label>
                                    <input type="number" class="form-control" name="phone"  value="{{$user->phone}}" readonly>
                                </div>   
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Cnic#</label>
                                    <input type="text" class="form-control" name="cnic"  value="{{$user->cnic}}" readonly>
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email"  value="{{$user->email}}">
                                </div>   
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputEmail4" value="{{$user->password}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">City</label>
                                    <select name="city" id="city" class="form-control form-control-select2" data-fouc>
                                        <option value="{{$user->city}}">{{$user->city}}</option>
                                        <optgroup label="Popular Cities">
                                            <option value="karachi">Karachi</option>
                                            <option value="lahore">Lahore</option>
                                            <option value="islamabad">Islamabad</option>
                                            <option value="rawalpindi">Rawalpindi</option>
                                            <option value="peshawar">Peshawar</option>
                                        </optgroup>
                                        <optgroup label="Other Cities">
                                            <option value="abdul-hakeem">Abdul Hakeem</option>
                                            <option value="abottabad">Abottabad</option>
                                            <option value="adda-jahan-khan">Adda jahan khan</option>
                                            <option value="adda-shaiwala">Adda shaiwala</option>
                                            <option value="ahmed-pur-east">Ahmed Pur East</option>
                                            <option value="ahmedpur-lamma">Ahmedpur Lamma</option>
                                            <option value="akhora-khattak">Akhora khattak</option>
                                            <option value="ali-chak">Ali chak</option>
                                            <option value="alipur-chatta">Alipur Chatta</option>
                                            <option value="allahabad">Allahabad</option>
                                            <option value="amangarh">Amangarh</option>
                                            <option value="arifwala">Arifwala</option>
                                            <option value="attock">Attock</option>
                                            <option value="babarloi">Babarloi</option>
                                            <option value="babri-banda">Babri banda</option>
                                            <option value="badin">Badin</option>
                                            <option value="bahawal-nagar">Bahawal Nagar</option>
                                            <option value="bahawalpur">Bahawalpur</option>
                                            <option value="balakot">Balakot</option>
                                            <option value="bannu">Bannu</option>
                                            <option value="baroute">Baroute</option>
                                            <option value="basirpur">Basirpur</option>
                                            <option value="basti-shorekot">Basti Shorekot</option>
                                            <option value="bat-khela">Bat khela</option>
                                            <option value="batang--2">Batang</option>
                                            <option value="bhai-pheru">Bhai pheru</option>
                                            <option value="bhakkar">Bhakkar</option>
                                            <option value="bhalwal">Bhalwal</option>
                                            <option value="bhan-saeedabad">Bhan saeedabad</option>
                                            <option value="bhera">Bhera</option>
                                            <option value="bhikky">Bhikky</option>
                                            <option value="bhimber">Bhimber</option>
                                            <option value="bhirya-road">Bhirya road</option>
                                            <option value="bhuawana">Bhuawana</option>
                                            <option value="buchay-key">Buchay key</option>
                                            <option value="burewala">Burewala</option>
                                            <option value="chacklala">Chacklala</option>
                                            <option value="chaininda">Chaininda</option>
                                            <option value="chak-4-b-c">Chak 4 b c</option>
                                            <option value="chak-46">Chak 46</option>
                                            <option value="chak-jamal">Chak jamal</option>
                                            <option value="chak-jhumra">Chak jhumra</option>
                                            <option value="chak-shahzad">Chak Shahzad</option>
                                            <option value="chaksawari">Chaksawari</option>
                                            <option value="chakwal">Chakwal</option>
                                            <option value="charsadda">Charsadda</option>
                                            <option value="chashma">Chashma</option>
                                            <option value="chawinda">Chawinda</option>
                                            <option value="chichawatni">Chichawatni</option>
                                            <option value="chiniot">Chiniot</option>
                                            <option value="chishtian">Chishtian</option>
                                            <option value="chitral">Chitral</option>
                                            <option value="chohar-jamali">Chohar jamali</option>
                                            <option value="choppar-hatta">Choppar hatta</option>
                                            <option value="chowha-saidan-shah">Chowha saidan shah</option>
                                            <option value="chowk-azam">Chowk azam</option>
                                            <option value="chowk-mailta">Chowk mailta</option>
                                            <option value="chowk-munda">Chowk munda</option>
                                            <option value="chunian">Chunian</option>
                                            <option value="d-g-khan">D.G.Khan</option>
                                            <option value="dadakhel">Dadakhel</option>
                                            <option value="dadu">Dadu</option>
                                            <option value="dadyal-ak">Dadyal Ak</option>
                                            <option value="daharki">Daharki</option>
                                            <option value="dandot">Dandot</option>
                                            <option value="dargai">Dargai</option>
                                            <option value="darya-khan">Darya khan</option>
                                            <option value="daska">Daska</option>
                                            <option value="daud-khel">Daud khel</option>
                                            <option value="daulatpur">Daulatpur</option>
                                            <option value="deh-pathaan">Deh pathaan</option>
                                            <option value="depal-pur">Depal pur</option>
                                            <option value="dera-allah-yar">Dera Allah Yar</option>
                                            <option value="dera-ismail-khan">Dera ismail khan</option>
                                            <option value="dera-murad-jamali">Dera murad jamali</option>
                                            <option value="dera-nawab-sahib">Dera nawab sahib</option>
                                            <option value="dhatmal">Dhatmal</option>
                                            <option value="dhoun-kal">Dhoun kal</option>
                                            <option value="digri">Digri</option>
                                            <option value="dijkot">Dijkot</option>
                                            <option value="dina">Dina</option>
                                            <option value="dinga">Dinga</option>
                                            <option value="dir">Dir</option>
                                            <option value="doaaba">Doaaba</option>
                                            <option value="doltala">Doltala</option>
                                            <option value="domeli">Domeli</option>
                                            <option value="donga-bonga">Donga Bonga</option>
                                            <option value="dudial">Dudial</option>
                                            <option value="dunia-pur">Dunia Pur</option>
                                            <option value="eminabad">Eminabad</option>
                                            <option value="esa-khel">Esa Khel</option>
                                            <option value="faisalabad">Faisalabad</option>
                                            <option value="faqirwali">Faqirwali</option>
                                            <option value="farooqabad">Farooqabad</option>
                                            <option value="fateh-jang">Fateh Jang</option>
                                            <option value="fateh-pur">Fateh pur</option>
                                            <option value="feroz-walla">Feroz walla</option>
                                            <option value="feroz-watan">Feroz watan</option>
                                            <option value="ferozwatowan">Ferozwatowan</option>
                                            <option value="fiza-got">Fiza got</option>
                                            <option value="fort-abbass">Fort Abbass</option>
                                            <option value="gadoon-amazai">Gadoon amazai</option>
                                            <option value="gaggo-mandi">Gaggo mandi</option>
                                            <option value="gakhar-mandi">Gakhar mandi</option>
                                            <option value="gambat">Gambat</option>
                                            <option value="gambet">Gambet</option>
                                            <option value="garh-maharaja">Garh maharaja</option>
                                            <option value="garh-more">Garh more</option>
                                            <option value="garhi-yaseen">Garhi yaseen</option>
                                            <option value="gari-habibullah">Gari habibullah</option>
                                            <option value="gari-mori">Gari mori</option>
                                            <option value="gharo">Gharo</option>
                                            <option value="ghazi">Ghazi</option>
                                            <option value="ghotki">Ghotki</option>
                                            <option value="gilgit">Gilgit</option>
                                            <option value="gohar-ghoushti">Gohar ghoushti</option>
                                            <option value="gojar-khan">Gojar khan</option>
                                            <option value="gojra">Gojra</option>
                                            <option value="goth-machi">Goth Machi</option>
                                            <option value="goular-khel">Goular khel</option>
                                            <option value="guddu">Guddu</option>
                                            <option value="gujar-khan">Gujar Khan</option>
                                            <option value="gujranwala">Gujranwala</option>
                                            <option value="gujrat">Gujrat</option>
                                            <option value="gwadar">Gwadar</option>
                                            <option value="hafizabad">Hafizabad</option>
                                            <option value="hala">Hala</option>
                                            <option value="hangu">Hangu</option>
                                            <option value="harappa">Harappa</option>
                                            <option value="hari-pur">Hari pur</option>
                                            <option value="hariwala">Hariwala</option>
                                            <option value="haroonabad">Haroonabad</option>
                                            <option value="hasilpur">Hasilpur</option>
                                            <option value="hassan-abdal">Hassan abdal</option>
                                            <option value="hattar">Hattar</option>
                                            <option value="hattian">Hattian</option>
                                            <option value="hattian-lawrencepur">Hattian lawrencepur</option>
                                            <option value="havali-lakhan">Havali Lakhan</option>
                                            <option value="hawilian">Hawilian</option>
                                            <option value="hayatabad">Hayatabad</option>
                                            <option value="hazro">Hazro</option>
                                            <option value="head-marala">Head marala</option>
                                            <option value="hub">Hub</option>
                                            <option value="hub-balochistan">Hub-Balochistan</option>
                                            <option value="hujra-shah-mukeem">Hujra Shah Mukeem</option>
                                            <option value="hunza">Hunza</option>
                                            <option value="hyderabad">Hyderabad</option>
                                            <option value="iskandarabad">Iskandarabad</option>
                                            <option value="jacobabad">Jacobabad</option>
                                            <option value="jahaniya">Jahaniya</option>
                                            <option value="jaja-abasian">Jaja abasian</option>
                                            <option value="jalalpur-jattan">Jalalpur Jattan</option>
                                            <option value="jalalpur-pirwala">Jalalpur Pirwala</option>
                                            <option value="jampur">Jampur</option>
                                            <option value="jamrud-road">Jamrud road</option>
                                            <option value="jamshoro">Jamshoro</option>
                                            <option value="jan-pur">Jan pur</option>
                                            <option value="jand">Jand</option>
                                            <option value="jandanwala">Jandanwala</option>
                                            <option value="jaranwala">Jaranwala</option>
                                            <option value="jatlaan">Jatlaan</option>
                                            <option value="jatoi">Jatoi</option>
                                            <option value="jauharabad">Jauharabad</option>
                                            <option value="jehangira">Jehangira</option>
                                            <option value="jehlum">Jehlum</option>
                                            <option value="jhal-magsi">Jhal Magsi</option>
                                            <option value="jhand">Jhand</option>
                                            <option value="jhang">Jhang</option>
                                            <option value="jhatta-bhutta">Jhatta bhutta</option>
                                            <option value="jhudo">Jhudo</option>
                                            <option value="jin-pur">Jin Pur</option>
                                            <option value="k-n-shah">K.N. Shah</option>
                                            <option value="kabirwala">Kabirwala</option>
                                            <option value="kacha-khooh">Kacha khooh</option>
                                            <option value="kahuta">Kahuta</option>
                                            <option value="kakul">Kakul</option>
                                            <option value="kakur-town">Kakur town</option>
                                            <option value="kala-bagh">Kala bagh</option>
                                            <option value="kala-shah-kaku">Kala shah kaku</option>
                                            <option value="kalaswala">Kalaswala</option>
                                            <option value="kallar-kahar">Kallar Kahar</option>
                                            <option value="kallar-saddiyian">Kallar Saddiyian</option>
                                            <option value="kallur-kot">Kallur kot</option>
                                            <option value="kamalia">Kamalia</option>
                                            <option value="kamalia-musa">Kamalia musa</option>
                                            <option value="kamber-ali-khan">Kamber ali khan</option>
                                            <option value="kameer">Kameer</option>
                                            <option value="kamoke">Kamoke</option>
                                            <option value="kamra">Kamra</option>
                                            <option value="kandh-kot">Kandh kot</option>
                                            <option value="kandiaro">Kandiaro</option>
                                            <option value="karak">Karak</option>
                                            <option value="karoor-pacca">Karoor pacca</option>
                                            <option value="karore-lalisan">Karore lalisan</option>
                                            <option value="kashmir">Kashmir</option>
                                            <option value="kashmore">Kashmore</option>
                                            <option value="kasur">Kasur</option>
                                            <option value="kazi-ahmed">Kazi ahmed</option>
                                            <option value="khair-pur-mirs">Khair Pur Mirs</option>
                                            <option value="khairpur">Khairpur</option>
                                            <option value="khan-bela">Khan Bela</option>
                                            <option value="khan-qah-sharif">Khan qah sharif</option>
                                            <option value="khandabad">Khandabad</option>
                                            <option value="khanewal">Khanewal</option>
                                            <option value="khangarh">Khangarh</option>
                                            <option value="khanqah-dogran">Khanqah dogran</option>
                                            <option value="khanqah-sharif">Khanqah sharif</option>
                                            <option value="kharian">Kharian</option>
                                            <option value="khebar">Khebar</option>
                                            <option value="khewra">Khewra</option>
                                            <option value="khoski">Khoski</option>
                                            <option value="khudian-khas">Khudian Khas</option>
                                            <option value="khurian-wala">Khurian wala</option>
                                            <option value="khurrianwala">Khurrianwala</option>
                                            <option value="khushab">Khushab</option>
                                            <option value="khushal-kot">Khushal kot</option>
                                            <option value="khuzdar">Khuzdar</option>
                                            <option value="klaske">Klaske</option>
                                            <option value="kohat">Kohat</option>
                                            <option value="kot-addu">Kot addu</option>
                                            <option value="kot-bunglow">Kot bunglow</option>
                                            <option value="kot-ghulam-mohd">Kot ghulam mohd</option>
                                            <option value="kot-mithan">Kot mithan</option>
                                            <option value="kot-momin">Kot Momin</option>
                                            <option value="kot-radha-kishan">Kot radha kishan</option>
                                            <option value="kotla">Kotla</option>
                                            <option value="kotla-arab-ali-khan">Kotla arab ali khan</option>
                                            <option value="kotla-jam">Kotla jam</option>
                                            <option value="kotla-pathan">Kotla Pathan</option>
                                            <option value="kotly-ak">Kotly Ak</option>
                                            <option value="kotly-loharana">Kotly Loharana</option>
                                            <option value="kotri">Kotri</option>
                                            <option value="kumbh">Kumbh</option>
                                            <option value="kundina">Kundina</option>
                                            <option value="kunjah">Kunjah</option>
                                            <option value="kunri">Kunri</option>
                                            <option value="laki-marwat">Laki marwat</option>
                                            <option value="lala-musa">Lala musa</option>
                                            <option value="lala-rukh">Lala rukh</option>
                                            <option value="laliah">Laliah</option>
                                            <option value="lalshanra">Lalshanra</option>
                                            <option value="larkana">Larkana</option>
                                            <option value="lasbella">Lasbella</option>
                                            <option value="lawrence-pur">Lawrence pur</option>
                                            <option value="layyah">Layyah</option>
                                            <option value="liaqat-pur">Liaqat Pur</option>
                                            <option value="lodhran">Lodhran</option>
                                            <option value="lower-dir">Lower Dir</option>
                                            <option value="ludhan">Ludhan</option>
                                            <option value="madina">Madina</option>
                                            <option value="makli">Makli</option>
                                            <option value="malakand-agency">Malakand Agency</option>
                                            <option value="malikwal">Malikwal</option>
                                            <option value="mamu-kunjan">Mamu kunjan</option>
                                            <option value="mandi-bahauddin">Mandi bahauddin</option>
                                            <option value="mandra">Mandra</option>
                                            <option value="manga-mandi">Manga mandi</option>
                                            <option value="mangal-sada">Mangal sada</option>
                                            <option value="mangi">Mangi</option>
                                            <option value="mangla">Mangla</option>
                                            <option value="mangowal">Mangowal</option>
                                            <option value="manoabad">Manoabad</option>
                                            <option value="mansahra">Mansahra</option>
                                            <option value="mardan">Mardan</option>
                                            <option value="mari-indus">Mari indus</option>
                                            <option value="mastoi">Mastoi</option>
                                            <option value="matli">Matli</option>
                                            <option value="mehar">Mehar</option>
                                            <option value="mehmood-kot">Mehmood kot</option>
                                            <option value="mehrabpur">Mehrabpur</option>
                                            <option value="melsi">Melsi</option>
                                            <option value="mian-channu">Mian Channu</option>
                                            <option value="mian-wali">Mian Wali</option>
                                            <option value="minchanaabad">Minchanaabad</option>
                                            <option value="mingora">Mingora</option>
                                            <option value="mir-ali">Mir ali</option>
                                            <option value="miran-shah">Miran shah</option>
                                            <option value="mirpur-a-k">Mirpur A.K.</option>
                                            <option value="mirpur-khas">Mirpur khas</option>
                                            <option value="mirpur-mathelo">Mirpur mathelo</option>
                                            <option value="mithi">Mithi</option>
                                            <option value="mitiari">Mitiari</option>
                                            <option value="mohen-jo-daro">Mohen jo daro</option>
                                            <option value="more-kunda">More kunda</option>
                                            <option value="morgah">Morgah</option>
                                            <option value="moro">Moro</option>
                                            <option value="mubarik-pur">Mubarik pur</option>
                                            <option value="multan">Multan</option>
                                            <option value="muridkay">Muridkay</option>
                                            <option value="murree">Murree</option>
                                            <option value="musafir-khana">Musafir khana</option>
                                            <option value="mustung">Mustung</option>
                                            <option value="muzaffar-gargh">Muzaffar Gargh</option>
                                            <option value="muzaffarabad">Muzaffarabad</option>
                                            <option value="nankana-sahib">Nankana sahib</option>
                                            <option value="narang-mandi">Narang mandi</option>
                                            <option value="narowal">Narowal</option>
                                            <option value="naseerabad">Naseerabad</option>
                                            <option value="naukot">Naukot</option>
                                            <option value="naukundi">Naukundi</option>
                                            <option value="nawabshah">Nawabshah</option>
                                            <option value="new-saeedabad">New saeedabad</option>
                                            <option value="nilore">Nilore</option>
                                            <option value="noor-kot">Noor kot</option>
                                            <option value="nooriabad">Nooriabad</option>
                                            <option value="noorpur-nooranga">Noorpur nooranga</option>
                                            <option value="noshero-feroze">Noshero Feroze</option>
                                            <option value="noudero">Noudero</option>
                                            <option value="nowshera">Nowshera</option>
                                            <option value="nowshera-cantt">Nowshera cantt</option>
                                            <option value="nowshera-virka">Nowshera Virka</option>
                                            <option value="okara">Okara</option>
                                            <option value="other">Other</option>
                                            <option value="padidan">Padidan</option>
                                            <option value="pak-china-fertilizer">Pak china fertilizer</option>
                                            <option value="pak-pattan-sharif">Pak pattan sharif</option>
                                            <option value="panjan-kisan">Panjan kisan</option>
                                            <option value="panjgoor">Panjgoor</option>
                                            <option value="panno-aqil">Panno Aqil</option>
                                            <option value="panu-aqil">Panu Aqil</option>
                                            <option value="pasni">Pasni</option>
                                            <option value="pasroor">Pasroor</option>
                                            <option value="pattoki">Pattoki</option>
                                            <option value="phagwar">Phagwar</option>
                                            <option value="phalia">Phalia</option>
                                            <option value="phool-nagar">Phool nagar</option>
                                            <option value="piaro-goth">Piaro goth</option>
                                            <option value="pind-dadan-khan">Pind Dadan Khan</option>
                                            <option value="pindi-bhattiya">Pindi Bhattiya</option>
                                            <option value="pindi-bhohri">Pindi bhohri</option>
                                            <option value="pindi-gheb">Pindi gheb</option>
                                            <option value="piplan">Piplan</option>
                                            <option value="pir-mahal">Pir mahal</option>
                                            <option value="pishin">Pishin</option>
                                            <option value="qalandarabad">Qalandarabad</option>
                                            <option value="qamber-ali-khan">Qamber Ali Khan</option>
                                            <option value="qasba-gujrat">Qasba gujrat</option>
                                            <option value="qazi-ahmed">Qazi ahmed</option>
                                            <option value="qila-deedar-singh">Qila Deedar Singh</option>
                                            <option value="quaid-abad">Quaid Abad</option>
                                            <option value="quetta">Quetta</option>
                                            <option value="rabwah">Rabwah</option>
                                            <option value="rahim-yar-khan">Rahim Yar Khan</option>
                                            <option value="rahwali">Rahwali</option>
                                            <option value="raiwind">Raiwind</option>
                                            <option value="rajana">Rajana</option>
                                            <option value="rajanpur">Rajanpur</option>
                                            <option value="rangoo">Rangoo</option>
                                            <option value="ranipur">Ranipur</option>
                                            <option value="rato-dero">Rato Dero</option>
                                            <option value="rawala-kot">Rawala kot</option>
                                            <option value="rawat">Rawat</option>
                                            <option value="renala-khurd">Renala khurd</option>
                                            <option value="risalpur">Risalpur</option>
                                            <option value="rohri">Rohri</option>
                                            <option value="sadiqabad">Sadiqabad</option>
                                            <option value="sagri">Sagri</option>
                                            <option value="sahiwal">Sahiwal</option>
                                            <option value="saidu-sharif">Saidu sharif</option>
                                            <option value="sajawal">Sajawal</option>
                                            <option value="sakhi-sarwar">Sakhi Sarwar</option>
                                            <option value="samanabad">Samanabad</option>
                                            <option value="sambrial">Sambrial</option>
                                            <option value="samma-satta">Samma satta</option>
                                            <option value="sanghar">Sanghar</option>
                                            <option value="sanghi">Sanghi</option>
                                            <option value="sangla-hills">Sangla Hills</option>
                                            <option value="sangote">Sangote</option>
                                            <option value="sanjarpur">Sanjarpur</option>
                                            <option value="sanjwal">Sanjwal</option>
                                            <option value="sara-e-naurang">Sara e naurang</option>
                                            <option value="sara-e-alamgir">Sara-E-Alamgir</option>
                                            <option value="sargodha">Sargodha</option>
                                            <option value="satiayana">Satiayana</option>
                                            <option value="sawabi">Sawabi</option>
                                            <option value="sehar-baqlas">Sehar baqlas</option>
                                            <option value="sehwan-sharif">Sehwan Sharif</option>
                                            <option value="sekhat">Sekhat</option>
                                            <option value="serai-alamgir">Serai alamgir</option>
                                            <option value="shadiwal">Shadiwal</option>
                                            <option value="shah-kot">Shah kot</option>
                                            <option value="shahdad-kot">Shahdad kot</option>
                                            <option value="shahdara">Shahdara</option>
                                            <option value="shahpur-chakar">Shahpur chakar</option>
                                            <option value="shahpur-saddar">Shahpur Saddar</option>
                                            <option value="shaikhupura">Shaikhupura</option>
                                            <option value="shakargarh">Shakargarh</option>
                                            <option value="shamsabad">Shamsabad</option>
                                            <option value="shankiari">Shankiari</option>
                                            <option value="shedani-sharif">Shedani sharif</option>
                                            <option value="shehdadpur">Shehdadpur</option>
                                            <option value="shemier">Shemier</option>
                                            <option value="shiekhopura">Shiekhopura</option>
                                            <option value="shikar-pur">Shikar pur</option>
                                            <option value="shorekot-cantt">Shorekot Cantt</option>
                                            <option value="shorkot">Shorkot</option>
                                            <option value="shuja-abad">Shuja Abad</option>
                                            <option value="sialkot">Sialkot</option>
                                            <option value="sibi">Sibi</option>
                                            <option value="sihala">Sihala</option>
                                            <option value="sikandarabad">Sikandarabad</option>
                                            <option value="sillanwali">Sillanwali</option>
                                            <option value="sita-road">Sita road</option>
                                            <option value="skardu">Skardu</option>
                                            <option value="skrand">Skrand</option>
                                            <option value="sohawa">Sohawa</option>
                                            <option value="sohawa-district-daska">Sohawa district daska</option>
                                            <option value="sukkur">Sukkur</option>
                                            <option value="sumandari">Sumandari</option>
                                            <option value="swat">Swat</option>
                                            <option value="swatmingora">Swatmingora</option>
                                            <option value="takhtbai">Takhtbai</option>
                                            <option value="talagang">Talagang</option>
                                            <option value="talamba">Talamba</option>
                                            <option value="talhur">Talhur</option>
                                            <option value="tandiliyawala">Tandiliyawala</option>
                                            <option value="tando-adam">Tando adam</option>
                                            <option value="tando-allah-yar">Tando Allah Yar</option>
                                            <option value="tando-jam">Tando jam</option>
                                            <option value="tando-muhammad-khan">Tando Muhammad Khan</option>
                                            <option value="tank">Tank</option>
                                            <option value="tarbela">Tarbela</option>
                                            <option value="tarmatan">Tarmatan</option>
                                            <option value="tatlay-wali">Tatlay Wali</option>
                                            <option value="taunsa-sharif">Taunsa sharif</option>
                                            <option value="taxila">Taxila</option>
                                            <option value="tharo-shah">Tharo shah</option>
                                            <option value="thatta">Thatta</option>
                                            <option value="theing-jattan-more">Theing jattan more</option>
                                            <option value="thull">Thull</option>
                                            <option value="tibba-sultanpur">Tibba sultanpur</option>
                                            <option value="toba-tek-singh">Toba Tek Singh</option>
                                            <option value="topi">Topi</option>
                                            <option value="toru">Toru</option>
                                            <option value="tranda-muhammad-pannah">Tranda Muhammad Pannah</option>
                                            <option value="turbat">Turbat</option>
                                            <option value="ubaro">Ubaro</option>
                                            <option value="ubauro">Ubauro</option>
                                            <option value="ugoke">Ugoke</option>
                                            <option value="ukba">Ukba</option>
                                            <option value="umer-kot">Umer Kot</option>
                                            <option value="upper-deval">Upper deval</option>
                                            <option value="usta-muhammad">Usta Muhammad</option>
                                            <option value="vehari">Vehari</option>
                                            <option value="village-sunder">Village Sunder</option>
                                            <option value="wah-cantt">Wah cantt</option>
                                            <option value="wahi-hassain">Wahi hassain</option>
                                            <option value="wahn-bachran">Wahn Bachran</option>
                                            <option value="wan-radha-ram">Wan radha ram</option>
                                            <option value="warah">Warah</option>
                                            <option value="warburton">Warburton</option>
                                            <option value="wazirabad">Wazirabad</option>
                                            <option value="yazman-mandi">Yazman mandi</option>
                                            <option value="zafarwal">Zafarwal</option>
                                            <option value="zahir-peer">Zahir Peer</option>
                                                        </optgroup>
                                    </select>
                                </div>    
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">User Balance</label>
                                    <input type="number" class="form-control" name="balance" id="inputEmail4" value="{{$user->balance}}">
                                </div>   
                            </div>
                            <div class="text-right">
                                <button type="submit"  class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="password" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Deposit History</h5>
                    </div>
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Deposit Amount</th>
                                <th style="width:auto;">Deposit Tranc. ID# </th>
                                <th style="width:auto;">Payment Method </th>
                                <th style="width:auto;">Package</th>
                                <th style="width:auto;">Deposit Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->deposits as $deposit)
                            <tr> 
                                <td>{{$deposit->amount}}</td>
                                <td>{{$deposit->t_id}}</td>
                                <td>{{$deposit->payment}}</td>
                                <td>{{$deposit->package->name}}</td>
                                <td>{{Carbon\Carbon::parse($deposit->created_at)->format('d/m/Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>   
            <div class="tab-pane fade" id="draw" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Withdraw History</h5>
                    </div>
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Withdraw Amount</th>
                                <th style="width:auto;">Account Holder</th>
                                <th style="width:auto;">Account Number</th>
                                <th style="width:auto;">Payment Method</th>
                                <th style="width:auto;">Withdraw Request Date </th>
                                <th style="width:auto;">Withdraw Request Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->withdraws as $withdraw)
                            <tr> 
                                <td>{{$withdraw->payment}}</td>
                                <td>{{$withdraw->name}}</td>
                                <td>{{$withdraw->account}}</td>
                                <td>{{$withdraw->method}}</td>
                                <td>{{Carbon\Carbon::parse($withdraw->created_at)->format('d/m/Y')}}</td>
                                <td> @if($withdraw->status=="Completed")
                                    <span class="badge badge-success">{{$withdraw->status}}</span>
                                    @elseif($withdraw->status=="in process")
                                    <span class="badge badge-danger">{{$withdraw->status}}</span>
                                    @else
                                    <span class="badge badge-primary">{{$withdraw->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="tab-pane fade" id="donation" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Donation History</h5>
                    </div>
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Donation Amount</th>
                                <th style="width:auto;">Donation Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->donations as $donation)
                            <tr> 
                                <td>{{$donation->amount}}</td>
                                <td>{{Carbon\Carbon::parse($donation->created_at)->format('d/m/Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="referral" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Referral History</h5>
                    </div>
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">User Name</th>
                                <th style="width:auto;">User Email </th>
                                <th style="width:auto;">User Status </th>
                                <th style="width:auto;">User Earning </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->mrefers as $key => $user)
                            <tr> 
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if ($user->checkstatus() =='old')
                        <span class="badge badge-success">Active</span>                            
                        @elseif($user->checkstatus() =='expired')
                        <span class="badge badge-primary">Expired</span>  
                        @else
                                                <span class="badge badge-danger">Pending</span>                                                      
                        @endif</td>
                                <td>{{$user->balance}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



