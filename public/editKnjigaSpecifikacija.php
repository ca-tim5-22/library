<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!-- End Meta -->

    <!-- Title -->
    <title>Edit book | Specification | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="img/library-favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- End Title -->

    <!-- Styles -->
    <?php include('includes/layout/styles.php'); ?>
    <!-- End Styles -->
</head>

<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    <?php include('includes/layout/header.php'); ?>
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        <?php include('includes/layout/sidebar.php'); ?>
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Izmijeni podatke
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('book.index');}}" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija knjiga
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Izmijeni podatke
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-b-[2px] py-4 text-gray-500 border-gray-300 pl-[30px]">
                        <a href="editKnjiga.php" class="inline hover:text-blue-800">
                            Osnovni detalji
                        </a>
                        <a href="#" class="inline active-book-nav ml-[70px] hover:text-blue-800 ">
                            Specifikacija
                        </a>
                        <a href="editKnjigaMultimedija.php" class="inline ml-[70px] hover:text-blue-800">
                            Multimedija
                        </a>
                    </div>
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700 forma">
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                                <p>Broj strana <span class="text-red-500">*</span></p>
                                <input type="text" name="brStranaEdit" id="brStranaEdit" value="264" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStranaEdit()"/>
                                <div id="validateBrStranaEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Pismo <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="pismoEdit" id="pismoEdit" onclick="clearErrorsPismoEdit()">
                                    <option disabled></option>
                                    <option selected value="">
                                        Cirilica
                                    </option>
                                    <option value="">
                                        Latinica
                                    </option>
                                    <option value="">
                                        Arapsko
                                    </option>
                                    <option value="">
                                        Kinesko
                                    </option>
                                </select>
                                <div id="validatePismoEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Povez <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povezEdit" id="povezEdit" onclick="clearErrorsPovezEdit()">
                                    <option disabled></option>
                                    <option selected value="">
                                        Tvrdi
                                    </option>
                                    <option value="">
                                        Meki
                                    </option>
                                </select>
                                <div id="validatePovezEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>Format <span class="text-red-500">*</span></p>
                                <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="formatEdit" id="formatEdit" onclick="clearErrorsFormatEdit()">
                                    <option disabled></option>
                                    <option value="">
                                        A1
                                    </option>
                                    <option value="">
                                        A2
                                    </option>
                                    <option selected value="">
                                        21 cm
                                    </option>
                                </select>
                                <div id="validateFormatEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p>International Standard Book Num <span class="text-red-500">*</span></p>
                                <input type="text" name="isbnEdit" id="isbnEdit" value="1546213456878" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbnEdit()"/>
                                <div id="validateIsbnEdit"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="sacuvajSpecifikacijuEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacijaEdit()">
                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <?php include('includes/layout/inProgress.php'); ?>


    <!-- Scripts -->
    <?php include('includes/layout/scripts.php'); ?>
    <!-- End Scripts -->
    
</body>

</html>