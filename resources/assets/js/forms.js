window.onload = function () {
	var divDist = {
		BARISAL: {
			BARISAL: [
				"AGAILJHARA",
				"BABUGANJ",
				"BAKERGANJ",
				"BANARIPARA",
				"BARISAL SADAR",
				"GOURNADI",
				"HIZLA",
				"MEHENDIGANJ",
				"MULADI",
				"WAZIRPUR",
			],
			BARGUNA: [
				"AMTALI",
				"BAMNA",
				"BARGUNA SADAR",
				"BETAGI",
				"PATHARGHATA",
				"TALTALI",
			],
			BHOLA: [
				"BHOLA SADAR",
				"DAULATKHAN",
				"BURHANUDDIN",
				"TAZUMUDDIN",
				"LALMOHAN",
				"CHAR FASSON",
				"MANPURA",
			],
			JHALOKATI: ["JHALOKATI SADAR", "KATHALIA", "NALCHITY", "RAJAPUR"],
			PATUAKHALI: [
				"PATUAKHALI SADAR",
				"BAUPHAL",
				"MIRZAGANJ",
				"DUMKI",
				"GALACHIPA",
				"DASHMINA",
				"RANGABALI",
				"KALAPARA",
			],
			PIROJPUR: [
				"BHANDARIA",
				"KAWKHALI",
				"NESARABAD",
				"PIROJPUR SADAR",
				"MATHBARIA",
				"NAZIRPUR",
				"INDURKANI",
			],
		},
		CHITTAGONG: {
			BRAHMANBARIA: [
				"BRAHMANBARIA SADAR",
				"KASBA",
				"NABINAGAR",
				"NASIRNAGAR",
				"BIJOYNAGAR",
				"BANCHARAMPUR",
				"SARAIL",
				"AKHAURA",
				"ASHUGANJ",
			],
			CHANDPUR: [
				"HAIMCHAR",
				"HAJIGANJ",
				"KACHUA",
				"MATLAB DAKSHIN",
				"MATLAB UTTAR",
				"SHAHRASTI",
			],
			CHITTAGONG: [
				"ANWARA",
				"BANSHKHALI",
				"BOALKHALI",
				"CHANDANAISH",
				"FATIKCHHARI",
				"HATHAZARI",
				"KARNAPHULI",
				"RANGUNIA",
				"SANDWIP",
				"LOHAGARA",
				"MIRSHARAI",
				"PATIYA",
				"RAOZAN",
				"SATKANIA",
				"SITAKUNDA",
			],
			COMILLA: [
				"BARURA",
				"BRAHMANPARA",
				"BURICHANG",
				"CHANDINA",
				"CHAUDDAGRAM",
				"COMILLA SADAR",
				"COMILLA SADAR DAKSHIN UPAZILLA",
				"DAUDKANDI",
				"DEBIDWAR",
				"HOMNA",
				"LAKSAM",
				"LALMAI",
				"MONOHORGONJ",
				"MEGHNA",
				"MURADNAGAR",
				"NANGALKOT",
				"TITAS",
			],
			COXSBAZAR: [
				"CHAKARIA",
				"COX'S BAZAR SADAR",
				"KUTUBDIA",
				"MAHESHKHALI",
				"RAMU",
				"TEKNAF",
				"UKHIA",
				"PEKUA",
				"EIDGAON",
			],
			FENI: [
				"FENI SADAR",
				"CHAGALNAIYA",
				"DAGANBHUIYAN",
				"PARSHURAM",
				"SONAGAZI",
				"FALGAZI",
			],
			KHAGRACHHARI: [
				"DIGHINALA",
				"KHAGRACHHARI SADAR",
				"LAKSHMICHHARI",
				"MAHALCHHARI",
				"MANIKCHHARI",
				"MATIRANGA",
				"PANCHHARI",
				"RAMGARH",
				"GUIMARA",
			],
			LAKSHMIPUR: [
				"LAKSHMIPUR SADAR",
				"RAMGANJ",
				"RAIPUR",
				"RAMGATI",
				"KAMALNAGAR",
			],
			NOAKHALI: [
				"SENBAGH",
				"BEGUMGANJ",
				"CHATKHIL",
				"COMPANIGANJ",
				"NOAKHALI SADAR",
				"HATIYA",
				"KABIRHAT",
				"SONAIMURI",
				"SUBORNO CHAR",
				"BHASHAN CHAR",
			],
			RANGAMATI: [
				"RANGAMATI SADAR",
				"KAPTAI",
				"RAJASTHALI",
				"BELAICHHARI",
				"LANGADU",
				"BAGAICHHARI",
				"BARKAL",
				"JURAICHHARI",
				"KAUKHALI",
				"NANIARCHAR",
			],
			BANDARBAN: [
				" BANDARBAN SADAR",
				"THANCHI",
				"LAMA",
				"NAIKHONGCHHARI",
				"ALI KADAM",
				"ROWANGCHHARI",
				"RUMA",
			],
		},
		DHAKA: {
			DHAKA: ["DHAMRAI", "DOHAR", "KERANIGANJ", "NAWABGANJ ", "SAVAR"],
			GAZIPUR: [
				"GAZIPUR SADAR",
				"KALIAKAIR",
				"KAPASIA",
				"SREEPUR ",
				"KALIGANJ",
			],
			KISHOREGANJ: [
				"KULIARCHAR",
				"HOSSAINPUR",
				"PAKUNDIA",
				"KISHOREGANJ SADAR",
				"BAJITPUR",
				"AUSTAGRAM",
				"KARIMGANJ",
				"KATIADI",
				"TARAIL ",
				"ITNA",
				"NIKLI",
				"MITHAMAIN",
				"BHAIRAB",
			],
			MADARIPUR: [
				"MADARIPUR SADAR",
				"KALKINI",
				"DASAR",
				"RAJOIR",
				"SHIBCHAR",
			],
			MANIKGANJ: [
				"MANIKGANJ SADAR",
				"SINGAIR",
				"SHIVALAY",
				"SATURIA",
				"HARIRAMPUR",
				"GHIOR",
				"DAULATPUR",
			],
			MUNSHIGANJ: [
				"LOHAJANG",
				"SREENAGAR",
				"MUNSHIGANJ SADAR",
				"SIRAJDIKHAN",
				"TONGIBARI",
				"GAZARIA",
			],
			NARAYANGANJ: [
				"NARAYANGANJ SADAR",
				"SONARGAON",
				"BANDAR",
				"ARAIHAZAR ",
				"RUPGANJ",
			],
			NARSINGDI: [
				"BELABO",
				"MONOHARDI",
				"NARSINGDI SADAR",
				"PALASH ",
				"RAIPURA",
				"SHIBPUR",
			],
			RAJBARI: [
				"BALIAKANDI",
				"GOALANDA",
				"PANGSHA",
				"KALUKHALI",
				"RAJBARI SADAR",
			],
			SHARIATPUR: [
				"SHARIATPUR SADAR",
				"DAMUDYA",
				"NARIA",
				"ZANJIRA",
				"BHEDARGANJ",
				"GOSAIRHAT",
				"SHAKHIPUR",
			],
			TANGAIL: [
				"TANGAIL SADAR",
				"SAKHIPUR",
				"BASAIL",
				"MADHUPUR",
				"GHATAIL",
				"KALIHATI",
				"NAGARPUR",
				"MIRZAPUR",
				"GOPALPUR",
				"DELDUAR",
				"BHUAPUR",
				"DHANBARI",
			],
			FARIDPUR: [
				"ALFADANGA",
				"BHANGA",
				"BOALMARI",
				"CHARBHADRASAN",
				"FARIDPUR SADAR",
				"MADHUKHALI",
				"NAGARKANDA",
				"SADARPUR",
				"SALTHA",
			],
			GOPALGANJ: [
				"GOPALGANJ SADAR",
				"KASHIANI",
				"KOTALIPARA",
				"MUKSUDPUR",
				"TUNGIPARA",
			],
		},
		KHULNA: {
			BAGERHAT: [
				"BAGERHAT SADAR",
				"CHITALMARI",
				"FAKIRHAT",
				"KACHUA",
				"MOLLAHAT",
				"MONGLA",
				"MORRELGANJ",
				"RAMPAL",
				"SARANKHOLA",
			],
			CHUADANGA: ["CHUADANGA SADAR", "ALAMDANGA", "JIBANNAGAR", "DAMURHUDA"],
			JESSORE: [
				"ABHAYNAGAR ",
				"BAGHERPARA",
				"CHAUGACHHA",
				"JHIKARGACHHA",
				"KESHABPUR",
				"JESSORE SADAR",
				"MANIRAMPUR",
				"SHARSHA",
			],
			JHENAIDAH: [
				"JHENAIDAH SADAR",
				"MAHESHPUR",
				"KALIGANJ",
				"KOTCHANDPUR",
				"SHAILKUPA",
				"HARINAKUNDA",
			],
			KHULNA: [
				"DUMURIA",
				"BATIAGHATA",
				"DACOPE",
				"PHULTALA",
				"DIGHALIA",
				"KOYRA",
				"TEROKHADA",
				"RUPSHA",
				"PAIKGACHHA",
			],
			KUSHTIA: [
				"KUSHTIA SADAR",
				"MIRPUR",
				"KHOKSA",
				"BHERAMARA",
				"KUMARKHALI",
				"DAULATPUR",
			],
			MAGURA: ["MAGURA SADAR", "MOHAMMADPUR", "SHALIKHA", "SREEPUR"],
			MEHERPUR: ["GANGNI", "MEHERPUR SADAR", "MUJIBNAGAR"],
			NARAIL: ["NARAIL SADAR", "KALIA", "LOHAGARA"],
			SATKHIRA: [
				"SATKHIRA SADAR",
				"ASSASUNI",
				"DEBHATA",
				"TALA",
				"KALAROA",
				"KALIGANJ",
				"SHYAMNAGAR",
			],
		},
		RAJSHAHI: {
			RAJSHAHI: [
				"BAGMARA",
				"CHARGHAT",
				"DURGAPUR",
				"GODAGARI",
				"MOHANPUR",
				"PABA",
				"BAGHA",
				"PUTHIA",
				"TANORE",
			],
			SIRAJGANJ: [
				"SIRAJGANJ SADAR",
				"SHAHJADPUR",
				"TARASH",
				"KAZIPUR",
				"RAIGANJ",
				"BELKUCHI",
				"ULLAHPARA",
				"KAMARKHANDA",
				"CHAUHALI",
			],
			PABNA: [
				"ATGHARIA",
				"BERA",
				"BHANGURA",
				"CHATMOHAR",
				"FARIDPUR",
				"ISHWARDI",
				"PABNA SADAR",
				"SANTHIA",
				"SUJANAGAR",
			],
			BOGURA: [
				"ADAMDIGHI",
				"BOGRA SADAR",
				"SHERPUR",
				"DHUNAT",
				"DHUPCHANCHIA",
				"GABTALI",
				"KAHALOO",
				"NANDIGRAM",
				"SHAJAHANPUR",
				"SARIAKANDI",
				"SHIBGANJ",
				"SONATALA",
			],
			CHAPAINAWABGANJ: [
				"CHAPAI NAWABGANJ SADAR",
				"NACHOLE",
				"SHIBGANJ",
				"GOMASTAPUR",
				"BHOLAHAT",
			],
			NAOGAON: [
				"NAOGAON SADAR",
				"ATRAI",
				"DHAMOIRHAT",
				"BADALGACHHI",
				"NIAMATPUR",
				"MANDA",
				"MOHADEVPUR",
				"PATNITALA",
				"PORSHA",
				"SAPAHAR",
				"RANINAGAR",
			],
			JOYPURHAT: [
				"JOYPURHAT SADAR",
				"AKKELPUR",
				"KHETLAL",
				"PANCHBIBI",
				"KALAI",
			],
			NATORE: [
				"NATORE SADAR",
				"BAGATIPARA",
				"SINGRA",
				"BORAIGRAM",
				"GURUDASPUR",
				"LALPUR",
			],
		},
		SYLHET: {
			HABIGANJ: [
				"AJMIRIGANJ",
				"BANIACHANG",
				"BAHUBAL",
				"CHUNARUGHAT",
				"HABIGANJ SADAR",
				"LAKHAI",
				"MADHABPUR",
				"NABIGANJ",
				"SHAISTAGANJ",
			],
			MOULVIBAZAR: [
				"MOULVIBAZAR SADAR",
				"KAMALGANJ",
				"KULAURA",
				"RAJNAGAR",
				"REEMANGAL",
				"BARLEKHA",
				"JURI",
			],
			SUNAMGANJ: [
				"BISHWAMVARPUR",
				"CHHATAK",
				"SHANTIGANJ",
				"DERAI",
				"DHARAMAPASHA",
				"DOWARABAZAR",
				"JAGANNATHPUR",
				"JAMALGANJ",
				"SULLAH",
				"SUNAMGANJ SADAR",
				"TAHIRPUR",
				"MODDONAGAR",
			],
			SYLHET: [
				"BALAGANJ",
				"BEANIBAZAR",
				"BISHWANATH",
				"COMPANIGANJ",
				"DAKSHIN SURMA",
				"FENCHUGANJ",
				"GOLAPGANJ",
				"GOWAINGHAT",
				"JAINTIAPUR",
				"KANAIGHAT",
				"OSMANI NAGAR",
				"SYLHET SADAR",
				"ZAKIGANJ",
			],
		},
		RANGPUR: {
			DINAJPUR: [
				"BIRAL",
				"BIRAMPUR",
				"BIRGANJ",
				"BOCHAGANJ",
				"CHIRIRBANDAR",
				"DINAJPUR SADAR",
				"GHORAGHAT ",
				"HAKIMPUR",
				"KAHAROLE",
				"KHANSAMA",
				"NAWABGANJ",
				"PARBATIPUR",
				"FULBARI",
			],
			GAIBANDHA: [
				"FULCHHARI",
				"GAIBANDHA SADAR",
				"GOBINDAGANJ",
				"PALASHBARI",
				"SADULLAPUR",
				"SUNDARGANJ",
				"SAGHATA",
			],
			KURIGRAM: [
				"BHURUNGAMARI",
				"CHAR RAJIBPUR",
				"CHILMARI",
				"KURIGRAM SADAR",
				"NAGESHWARI",
				"PHULBARI",
				"RAJARHAT",
				"RAOMARI",
				"ULIPUR",
			],
			LALMONIRHAT: [
				"LALMONIRHAT SADAR",
				"ADITMARI",
				"KALIGANJ",
				"HATIBANDHA",
				"PATGRAM",
			],
			NILPHAMARI: [
				"NILPHAMARI SADAR",
				"SAIDPUR",
				"JALDHAKA",
				"KISHOREGANJ",
				"DOMAR",
				"DIMLA",
			],
			PANCHAGARH: [
				"PANCHAGARH SADAR",
				"DEBIGANJ",
				"BODA",
				"ATWARI",
				"TETULIA",
			],
			RANGPUR: [
				"BADARGANJ",
				"MITHAPUKUR",
				"GANGACHARA",
				"KAUNIA",
				"RANGPUR SADAR",
				"PIRGACHA",
				"PIRGANJ",
				"TARAGANJ",
			],
			THAKURGAON: [
				"THAKURGAON SADAR",
				"BALIADANGI",
				"HARIPUR",
				"RANISANKAIL",
				"PIRGANJ",
			],
		},
		MYMENSINGH: {
			MYMENSINGH: [
				"BHALUKA",
				"TRISHAL",
				"HALUAGHAT",
				"MUKTAGACHA",
				"DHOBAURA",
				"FULBARIA",
				"GAFFARGAON",
				"GAURIPUR",
				"ISHWARGANJ",
				"MYMENSINGH SADAR",
				"NANDAIL",
				"PHULPUR",
				"TARAKHANDA",
			],
			NETROKONA: [
				"ATPARA",
				"BARHATTA",
				"DURGAPUR",
				"KHALIAJURI",
				"KALMAKANDA",
				"KENDUA",
				"MADAN",
				"MOHANGANJ",
				"NETROKONA SADAR",
				"PURBADHALA",
			],
			JAMALPUR: ["DEWANGANJ", "BAKSIGANJ", "ISLAMPUR", "JAMALPUR SADAR"],
			SHERPUR: [
				"SHERPUR SADAR",
				"NALITABARI",
				"SREEBARDI",
				"JHENAIGATI",
				"NAKLA",
			],
		},
	};


	// Present Division, District, Sub-District selector
	var presDivisions = document.querySelector("#pres_division");
	var presDistricts = document.querySelector("#pres_district");
	var presUpozilla = document.querySelector("#pres_upozilla");

	// Present Division, District, Sub-District generator
	for (var x in divDist) {
		presDivisions.options[presDivisions.options.length] = new Option(x, x);
	}

	presDivisions.onchange = function () {
		presDistricts.length = 1;
		presUpozilla.length = 1;

		for (var y in divDist[this.value]) {
			presDistricts.options[presDistricts.options.length] = new Option(y, y);
		}
	};

	presDistricts.onchange = function () {
		presUpozilla.length = 1;

		var z = divDist[presDivisions.value][this.value];

		for (var i = 0; i < z.length; i++) {
			presUpozilla.options[presUpozilla.options.length] = new Option(
				z[i],
				z[i]
			);
		}
	};

	// Permanent Division, District, Sub-District selector
	var permDivisions = document.querySelector("#perm_division");
	var permDistricts = document.querySelector("#perm_district");
	var permUpozilla = document.querySelector("#perm_upozilla");

	// Permanent Division, District, Sub-District generator
	for (var x in divDist) {
		permDivisions.options[permDivisions.options.length] = new Option(x, x);
	}

	permDivisions.onchange = function () {
		permDistricts.length = 1;
		permUpozilla.length = 1;

		for (var y in divDist[this.value]) {
			permDistricts.options[permDistricts.options.length] = new Option(y, y);
		}
	};

	permDistricts.onchange = function () {
		permUpozilla.length = 1;

		var z = divDist[permDivisions.value][this.value];

		for (var i = 0; i < z.length; i++) {
			permUpozilla.options[permUpozilla.options.length] = new Option(
				z[i],
				z[i]
			);
		}
	};

	// Previous education Division, District, Sub-District selector
	var peDivisions = document.querySelector("#pe_division");
	var peDistricts = document.querySelector("#pe_district");
	var peUpozilla = document.querySelector("#pe_upozilla");

	// Previous education Division, District, Sub-District generator
	for (var x in divDist) {
		peDivisions.options[peDivisions.options.length] = new Option(x, x);
	}

	peDivisions.onchange = function () {
		peDistricts.length = 1;
		peUpozilla.length = 1;

		for (var y in divDist[this.value]) {
			peDistricts.options[peDistricts.options.length] = new Option(y, y);
		}
	};

	peDistricts.onchange = function () {
		peUpozilla.length = 1;

		var z = divDist[peDivisions.value][this.value];

		for (var i = 0; i < z.length; i++) {
			peUpozilla.options[peUpozilla.options.length] = new Option(z[i], z[i]);
		}
	};

	//Current education Division, District, Sub-District selector
	var ceDivisions = document.querySelector("#ce_division");
	var ceDistricts = document.querySelector("#ce_district");
	var ceUpozilla = document.querySelector("#ce_upozilla");

	// Previous education Division, District, Sub-District generator
	for (var x in divDist) {
		ceDivisions.options[ceDivisions.options.length] = new Option(x, x);
	}

	ceDivisions.onchange = function () {
		ceDistricts.length = 1;
		ceUpozilla.length = 1;

		for (var y in divDist[this.value]) {
			ceDistricts.options[ceDistricts.options.length] = new Option(y, y);
		}
	};

	ceDistricts.onchange = function () {
		ceUpozilla.length = 1;

		var z = divDist[ceDivisions.value][this.value];

		for (var i = 0; i < z.length; i++) {
			ceUpozilla.options[ceUpozilla.options.length] = new Option(z[i], z[i]);
		}
	};

	var mobile_bank = document.querySelector("#payment-mobile");
	var bank = document.querySelector("#payment-bank");
	var mobile_bank_div = document.querySelector("#payment-mobile-info");
	var bank_div = document.querySelector("#payment-bank-info");

	// check on click

	//mobile bank
	mobile_bank.onclick = function () {
		mobile_bank_div.style.display = "flex";
		bank_div.style.display = "none";

		document.querySelectorAll(".mobile-unchecked").forEach((item) => {
			item.setAttribute("required", "required");
			item.classList.add("is-invalid");
		});

		document.querySelectorAll(".banking-unchecked").forEach((item) => {
			item.removeAttribute("required", "required");
			item.classList.remove("is-invalid");
		});
	};

	//Bank
	bank.onclick = function () {
		mobile_bank_div.style.display = "none";
		bank_div.style.display = "flex";

		document.querySelectorAll(".banking-unchecked").forEach((item) => {
			item.setAttribute("required", "required");
			item.classList.add("is-invalid");
		});

		document.querySelectorAll(".mobile-unchecked").forEach((item) => {
			item.removeAttribute("required", "required");
			item.classList.remove("is-invalid");
		});
	};

	// if checked by default
	if (bank.checked) {
		bank_div.style.display = "flex";
		mobile_bank_div.style.display = "none";

		document.querySelectorAll(".banking-unchecked").forEach((item) => {
			item.setAttribute("required", "required");
			item.classList.add("is-invalid");
		});

		document.querySelectorAll(".mobile-unchecked").forEach((item) => {
			item.removeAttribute("required", "required");
			item.classList.remove("is-invalid");
		});
	} else {
		bank_div.style.display = "none";
		mobile_bank_div.style.display = "flex";

		document.querySelectorAll(".mobile-unchecked").forEach((item) => {
			item.setAttribute("required", "required");
		});

		document.querySelectorAll(".banking-unchecked").forEach((item) => {
			item.removeAttribute("required", "required");
		});
	}
};

// form validator

$(function () {
	"use strict";

	if (document.querySelector(".invalid")) {
		document.querySelectorAll(".text-danger").forEach(function (element) {
			document
				.querySelectorAll(".invalid-feedback")
				.forEach(function (element) {
					element.remove("invalid-feedback");
				});
		});
	}

	var bootstrapForm = $(".needs-validation"),
		picker = $(".picker");

	// Picker
	if (picker.length) {
		picker.flatpickr({
			allowInput: true,
			onReady: function (selectedDates, dateStr, instance) {
				if (instance.isMobile) {
					$(instance.mobileInput).attr("step", null);
				}
			},
		});
	}

	// Bootstrap Validation
	// --------------------------------------------------------------------
	if (bootstrapForm.length) {
		Array.prototype.filter.call(bootstrapForm, function (form) {
			form.addEventListener("submit", function (event) {
				if (form.checkValidity() === false) {
					form.classList.add("invalid");
					event.preventDefault();
				}
				form.classList.add("was-validated");

				// if (inputGroupValidation) {
				//   inputGroupValidation(form);
				// }
			});
			bootstrapForm
				.find("input, textarea, select")
				.on("focusout", function () {
					$(this)
						.removeClass("is-valid is-invalid")
						.addClass(this.checkValidity() ? "is-valid" : "is-invalid");
					// if (inputGroupValidation) {
					//   inputGroupValidation(this);
					// }
				});
		});
	}

	if (document.querySelector(".invalid")) {
		document.querySelectorAll(".text-danger").forEach(function (element) {
			document
				.querySelectorAll(".invalid-feedback")
				.forEach(function (element) {
					element.remove("invalid-feedback");
				});
		});
	}
});



var inputFields = document.querySelectorAll('input[type="text"]:not(.bn)');
inputFields.forEach(function (input) {
	input.addEventListener('keyup', function () {
		this.value = this.value.toUpperCase();
	});
});