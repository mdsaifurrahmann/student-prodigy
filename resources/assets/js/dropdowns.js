;
window.onload = function() {
    var divDist = {
        "Barisal": {
            'Barisal':['Agailjhara','Babuganj','Bakerganj','Banaripara', 'Barisal Sadar', 'Gournadi', 'Hizla', 'Mehendiganj','Muladi', 'Wazirpur'],
            'Barguna':['Amtali','Bamna', 'Barguna Sadar', 'Betagi', 'Patharghata', 'Taltali'],
            'Bhola':['Bhola Sadar', 'Daulatkhan', 'Burhanuddin','Tazumuddin','Lalmohan', 'Char Fasson', 'Manpura'],
            'Jhalokati':['Jhalokati Sadar', 'Kathalia', 'Nalchity', 'Rajapur'],
            'Patuakhali':['Patuakhali Sadar', 'Bauphal', 'Mirzaganj', 'Dumki', 'Galachipa', 'Dashmina', 'Rangabali', 'Kalapara'],
            'Pirojpur':['Bhandaria', 'Kawkhali', 'Nesarabad', 'Pirojpur Sadar', 'Mathbaria', 'Nazirpur', 'Indurkani'],
        },
        "Chittagong": {
            'Brahmanbaria':['Brahmanbaria Sadar','Kasba', 'Nabinagar', 'Nasirnagar', 'Bijoynagar', 'Bancharampur', 'Sarail','Akhaura','Ashuganj'],
            'Chandpur':['Haimchar','Hajiganj','Kachua','Matlab Dakshin','Matlab Uttar','Shahrasti'],
            'Chittagong':['Anwara','Banshkhali','Boalkhali','Chandanaish','Fatikchhari','Hathazari','Karnaphuli','Rangunia','Sandwip','LOHAGARA','Mirsharai','Patiya','Raozan','Satkania','Sitakunda'],
            'Comilla':['Barura','Brahmanpara','Burichang','Chandina','Chauddagram','Comilla Sadar','Comilla Sadar Dakshin Upazilla','Daudkandi','Debidwar','Homna','Laksam','Lalmai','Monohorgonj','Meghna','Muradnagar','Nangalkot','Titas'],
            'Coxsbazar':['Chakaria','Cox\'s Bazar Sadar','Kutubdia','Maheshkhali','Ramu','Teknaf','Ukhia','Pekua','Eidgaon'],
            'Feni':['Feni Sadar','Chagalnaiya','Daganbhuiyan','Parshuram','Sonagazi','Falgazi'],
            'Khagrachhari':['Dighinala','Khagrachhari Sadar','Lakshmichhari','Mahalchhari','Manikchhari','Matiranga','Panchhari','Ramgarh','Guimara'],
            'Lakshmipur':['Lakshmipur Sadar','Ramganj','Raipur','Ramgati','Kamalnagar'],
            'Noakhali':['Senbagh','Begumganj','Chatkhil','Companiganj','Noakhali Sadar','Hatiya','Kabirhat','Sonaimuri','Suborno Char','Bhashan char'],
            'Rangamati':['Rangamati Sadar','Kaptai','Rajasthali','Belaichhari','Langadu','Bagaichhari','Barkal','Juraichhari','Kaukhali','Naniarchar'],
            'Bandarban':[' Bandarban Sadar','Thanchi', 'Lama','Naikhongchhari','Ali kadam','Rowangchhari','Ruma']
        },
        "Dhaka": {
            'Dhaka':['Dhamrai','Dohar','Keraniganj','Nawabganj ','Savar'],
            'Gazipur':['Gazipur Sadar','Kaliakair','Kapasia','Sreepur ','Kaliganj'],
            'Kishoreganj':['Kuliarchar','Hossainpur','Pakundia','Kishoreganj Sadar','Bajitpur','Austagram','Karimganj','Katiadi','Tarail ','Itna','Nikli','Mithamain','Bhairab',],
            'Madaripur':['Madaripur Sadar','Kalkini','Dasar','Rajoir','Shibchar',],
            'Manikganj':['Manikganj Sadar','Singair','Shivalay','Saturia','Harirampur','Ghior','Daulatpur',],
            'Munshiganj':['Lohajang','Sreenagar','Munshiganj Sadar','Sirajdikhan','Tongibari','Gazaria'],
            'Narayanganj':['Narayanganj Sadar','Sonargaon','Bandar','Araihazar ','Rupganj',],
            'Narsingdi':['Belabo','Monohardi','Narsingdi Sadar','Palash ','Raipura','Shibpur',],
            'Rajbari':['Baliakandi','Goalanda','Pangsha','Kalukhali','Rajbari Sadar',],
            'Shariatpur':['Shariatpur Sadar','Damudya','Naria','Zanjira','Bhedarganj','Gosairhat','Shakhipur',],
            'Tangail':['Tangail Sadar','Sakhipur','Basail','Madhupur','Ghatail','Kalihati','Nagarpur','Mirzapur','Gopalpur','Delduar','Bhuapur','Dhanbari',],
            'Faridpur':['Alfadanga','Bhanga','Boalmari','Charbhadrasan','Faridpur Sadar','Madhukhali','Nagarkanda','Sadarpur','Saltha',	],
            'Gopalganj':[	'Gopalganj Sadar','Kashiani','Kotalipara','Muksudpur','Tungipara',]
        },
        "Khulna": {
            'Bagerhat':['Bagerhat Sadar','Chitalmari','Fakirhat','Kachua','Mollahat','Mongla','Morrelganj','Rampal','Sarankhola',],
            'Chuadanga':['Chuadanga Sadar','Alamdanga','Jibannagar','Damurhuda',],
            'Jessore':['Abhaynagar ','Bagherpara','Chaugachha','Jhikargachha','Keshabpur','Jessore Sadar','Manirampur','Sharsha',],
            'Jhenaidah':['Jhenaidah Sadar','Maheshpur','Kaliganj','Kotchandpur','Shailkupa','Harinakunda',],
            'Khulna':['Dumuria','Batiaghata','Dacope','Phultala','Dighalia','Koyra','Terokhada','Rupsha','Paikgachha',],
            'Kushtia':['Kushtia Sadar','Mirpur','Khoksa','Bheramara','Kumarkhali','Daulatpur',],
            'Magura':['Magura Sadar','Mohammadpur','Shalikha','Sreepur',],
            'Meherpur':['Gangni','Meherpur Sadar','Mujibnagar',],
            'Narail':['Narail Sadar','Kalia','Lohagara',],
            'Satkhira':['Satkhira Sadar','Assasuni','Debhata','Tala','Kalaroa','Kaliganj','Shyamnagar',]
        },
        "Rajshahi": {
            'Rajshahi':['Bagmara','Charghat','Durgapur','Godagari','Mohanpur','Paba','Bagha','Puthia','Tanore'],
            'Sirajganj':['Sirajganj Sadar','Shahjadpur','Tarash','Kazipur','Raiganj','Belkuchi','Ullahpara','Kamarkhanda','Chauhali'],
            'Pabna':['Atgharia','Bera','Bhangura','Chatmohar','Faridpur','Ishwardi','Pabna Sadar','Santhia','Sujanagar'],
            'Bogura':['Adamdighi','Bogra Sadar','Sherpur','Dhunat','Dhupchanchia','Gabtali','Kahaloo','Nandigram','Shajahanpur','Sariakandi','Shibganj','Sonatala'],
            'Chapainawabganj':['Chapai Nawabganj Sadar','Nachole','Shibganj','Gomastapur','Bholahat'],
            'Naogaon':['Naogaon Sadar','Atrai','Dhamoirhat','Badalgachhi','Niamatpur','Manda','Mohadevpur','Patnitala','Porsha','Sapahar','Raninagar'],
            'Joypurhat':['Joypurhat Sadar','Akkelpur','Khetlal','Panchbibi','Kalai'],
            'Natore':['Natore Sadar','Bagatipara','Singra','Boraigram','Gurudaspur','Lalpur']
        },
        "Sylhet": {
            'Habiganj':['Ajmiriganj','Baniachang','Bahubal','Chunarughat','Habiganj Sadar','Lakhai','Madhabpur','Nabiganj','Shaistaganj'],
            'Moulvibazar':['Moulvibazar Sadar','Kamalganj','Kulaura','Rajnagar','reemangal','Barlekha','Juri'],
            'Sunamganj':['Bishwamvarpur','Chhatak','Shantiganj','Derai','Dharamapasha','Dowarabazar','Jagannathpur','Jamalganj','Sullah','Sunamganj Sadar','Tahirpur','Moddonagar'],
            'Sylhet':['Balaganj','Beanibazar','Bishwanath','Companiganj','Dakshin Surma','Fenchuganj','Golapganj','Gowainghat','Jaintiapur','Kanaighat','Osmani Nagar','Sylhet Sadar','Zakiganj']
        },
        "Rangpur": {
            'Dinajpur': ['Biral','Birampur','Birganj','Bochaganj','Chirirbandar','Dinajpur Sadar','Ghoraghat ','Hakimpur','Kaharole','Khansama','Nawabganj','Parbatipur','Fulbari',],
            'Gaibandha':['Fulchhari','Gaibandha Sadar','Gobindaganj','Palashbari','Sadullapur','Sundarganj','Saghata',],
            'Kurigram':['Bhurungamari','Char Rajibpur','Chilmari','Kurigram Sadar','Nageshwari','Phulbari','Rajarhat','Raomari','Ulipur',
            ],
            'Lalmonirhat':['Lalmonirhat Sadar','Aditmari','Kaliganj','Hatibandha','Patgram',],
            'Nilphamari':['Nilphamari Sadar','Saidpur','Jaldhaka','Kishoreganj','Domar','Dimla',],
            'Panchagarh':['Panchagarh Sadar','Debiganj','Boda','Atwari','Tetulia',],
            'Rangpur':['Badarganj','Mithapukur','Gangachara','Kaunia','Rangpur Sadar','Pirgacha','Pirganj','Taraganj',],
            'Thakurgaon':['Thakurgaon Sadar','Baliadangi','Haripur','Ranisankail','Pirganj',]
        },
        "Mymensingh": {
            'Mymensingh':['Bhaluka','Trishal','Haluaghat','Muktagacha','Dhobaura','Fulbaria','Gaffargaon','Gauripur','Ishwarganj','Mymensingh Sadar','Nandail','Phulpur','Tarakhanda'],
            'Netrokona':['Atpara','Barhatta','Durgapur','Khaliajuri','Kalmakanda','Kendua','Madan','Mohanganj','Netrokona Sadar','Purbadhala'],
            'Jamalpur':['Dewanganj','Baksiganj','Islampur','Jamalpur Sadar'],
            'Sherpur':['Sherpur Sadar','Nalitabari','Sreebardi','Jhenaigati','Nakla']
        },
    }

    // Present Division, District, Sub-District selector
    var presDivisions = document.querySelector('#pres_division');
    var presDistricts = document.querySelector('#pres_district');
    var presUpozilla  = document.querySelector('#pres_upozilla');

    // Present Division, District, Sub-District generator
    for(var x in divDist){
        presDivisions.options[presDivisions.options.length] = new Option(x,x);
    }

    presDivisions.onchange = function(){
        presDistricts.length = 1;
        presUpozilla.length = 1;

        for(var y in divDist[this.value]){
            presDistricts.options[presDistricts.options.length] = new Option(y,y);
        }
    }

    presDistricts.onchange = function(){
        presUpozilla.length = 1;

        var z = divDist[presDivisions.value][this.value];

        for(var i = 0; i < z.length; i++){
            presUpozilla.options[presUpozilla.options.length] = new Option(z[i],z[i]);
        }
    }


    // Permanent Division, District, Sub-District selector
    var permDivisions = document.querySelector('#perm_division');
    var permDistricts = document.querySelector('#perm_district');
    var permUpozilla  = document.querySelector('#perm_upozilla');

    // Permanent Division, District, Sub-District generator
    for(var x in divDist){
        permDivisions.options[permDivisions.options.length] = new Option(x,x);
    }

    permDivisions.onchange = function(){
        permDistricts.length = 1;
        permUpozilla.length = 1;

        for(var y in divDist[this.value]){
            permDistricts.options[permDistricts.options.length] = new Option(y,y);
        }
    }

    permDistricts.onchange = function(){
        permUpozilla.length = 1;

        var z = divDist[permDivisions.value][this.value];

        for(var i = 0; i < z.length; i++){
            permUpozilla.options[permUpozilla.options.length] = new Option(z[i],z[i]);
        }
    }


    // Previous education Division, District, Sub-District selector
    var peDivisions = document.querySelector('#pe_division');
    var peDistricts = document.querySelector('#pe_district');
    var peUpozilla  = document.querySelector('#pe_upozilla');

    // Previous education Division, District, Sub-District generator
    for(var x in divDist){
        peDivisions.options[peDivisions.options.length] = new Option(x,x);
    }

    peDivisions.onchange = function(){
        peDistricts.length = 1;
        peUpozilla.length = 1;

        for(var y in divDist[this.value]){
            peDistricts.options[peDistricts.options.length] = new Option(y,y);
        }
    }

    peDistricts.onchange = function(){
        peUpozilla.length = 1;

        var z = divDist[peDivisions.value][this.value];

        for(var i = 0; i < z.length; i++){
            peUpozilla.options[peUpozilla.options.length] = new Option(z[i],z[i]);
        }
    }


    //Current education Division, District, Sub-District selector
    var ceDivisions = document.querySelector('#ce_division');
    var ceDistricts = document.querySelector('#ce_district');
    var ceUpozilla  = document.querySelector('#ce_upozilla');

    // Previous education Division, District, Sub-District generator
    for(var x in divDist){
        ceDivisions.options[ceDivisions.options.length] = new Option(x,x);
    }

    ceDivisions.onchange = function(){
        ceDistricts.length = 1;
        ceUpozilla.length = 1;

        for(var y in divDist[this.value]){
            ceDistricts.options[ceDistricts.options.length] = new Option(y,y);
        }
    }

    ceDistricts.onchange = function(){
        ceUpozilla.length = 1;

        var z = divDist[ceDivisions.value][this.value];

        for(var i = 0; i < z.length; i++){
            ceUpozilla.options[ceUpozilla.options.length] = new Option(z[i],z[i]);
        }
    }

    var mobile_bank = document.querySelector('#payment-mobile');
    var bank = document.querySelector('#payment-bank');
    var mobile_bank_div = document.querySelector('#payment-mobile-info');
    var bank_div = document.querySelector('#payment-bank-info');

    mobile_bank.onclick = function(){
        mobile_bank_div.style.display = 'flex';
        bank_div.style.display = 'none';
    }

    bank.onclick = function(){
        mobile_bank_div.style.display = 'none';
        bank_div.style.display = 'flex';
    }
}
;

//form validator

$(function () {
    'use strict';

    var bootstrapForm = $('.needs-validation'),
        picker = $('.picker'),
        select = $('.select2');

    // select2
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this
            .select2({
                placeholder: 'Select value',
                dropdownParent: $this.parent()
            })
            .change(function () {
                $(this).valid();
            });
    });

    // Picker
    if (picker.length) {
        picker.flatpickr({
            allowInput: true,
            onReady: function (selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                    $(instance.mobileInput).attr('step', null);
                }
            }
        });
    }

    // Bootstrap Validation
    // --------------------------------------------------------------------
    if (bootstrapForm.length) {
        Array.prototype.filter.call(bootstrapForm, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    form.classList.add('invalid');
                }
                form.classList.add('was-validated');
                event.preventDefault();
                // if (inputGroupValidation) {
                //   inputGroupValidation(form);
                // }
            });
            bootstrapForm.find('input, textarea').on('focusout', function () {
                $(this)
                    .removeClass('is-valid is-invalid')
                    .addClass(this.checkValidity() ? 'is-valid' : 'is-invalid');
                // if (inputGroupValidation) {
                //   inputGroupValidation(this);
                // }
            });
        });
    }
});
