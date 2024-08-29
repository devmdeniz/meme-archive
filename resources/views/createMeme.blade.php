<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Meme - {{ env('WEBSITE_TITLE') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.css"
        integrity="sha512-QPZjpT373lOJheWW3zuNJscevKKYE2Gdt57/oSPRtQFcZ9pM6AOuTKeVaEfqW6G/kPl9c24+S3OlaRN5OhxkgQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.js"
        integrity="sha512-usm+JyA4pcZ0mPqWsJugUq63sbcD1jNUZhFwTDs5rb/9R8xApGaayJaY6BK3rPulS2p3adXTQXCWU68SVE4Epw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .multi-search-filter {
            border: 1px solid #DDD;
            border-radius: 3px;
            padding: 3px;
            min-height: 26px;
        }

        .multi-search-filter>input {
            border: 0px;
            outline: none;
            font-size: 20px;
        }

        .multi-search-item {
            margin: 2px;
            padding: 2px 24px 2px 8px;
            float: left;
            display: flex;
            background-color: rgb(204, 204, 204);
            color: rgb(51, 51, 51);
            border-radius: 3px;
            position: relative;
        }

        .multi-search-item>span {
            font-family: 'Muli';
            line-height: 18px;
        }

        .multi-search-item>.fa {
            font-size: 12px;
            line-height: 18px;
            margin-left: 8px;
            position: absolute;
            right: 8px;
            top: 2px;
        }
    </style>
</head>

<body>
    @include('templates.header')
    <div class="flex flex-col rounded-2xl w-96 bg-[#ffffff] shadow-xl">
        <div class="flex flex-col p-8">
            <div class="text-2xl font-bold  text-center text-[#374151] pb-6">Select Meme Type</div>
            <form class=" text-lg  text-center text-[#374151]">
                
            </form>
        </div>
    </div>
    <div
        class="flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 bg-[#ffffff] rounded-2xl shadow-xl">
        <div class="flex flex-row gap-3 pb-4">
            <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto">Create Meme Archive</h1>
        </div>
        <form class="flex flex-col" data-bitwarden-watching="1" method="POST" action="{{ route("PostMeme") }}">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Meme Title
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" name="title" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Meme Type
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select`
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" name="memeType" type="text">
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Meme Keywords
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="multi-search-filter"
                        onclick="Array.from(this.children).find(n=>n.tagName==='INPUT').focus()">
                        <input type="text" onkeyup="multiSearchKeyup(this)">
                        <input type="hidden" name="keywords" value="">
                    </div>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Meme Image
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text"
                        name="imageURL" value="https://i.kym-cdn.com/entries/icons/mobile/000/029/268/cover5.jpg">
                </div>
            </div>
            <button type="submit"
                class="w-full text-[#FFFFFF] bg-[#198754] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">
                Add Meme
            </button>
        </form>
    </div>


    <script>
        const keywords = [];

        function multiSearchKeyup(inputElement) {
            if (event.keyCode === 27) {
                const newItem = createFilterItem(inputElement.value);
                inputElement.parentNode.insertBefore(newItem, inputElement);

                keywords.push(inputElement.value);

                console.log(keywords);

                updateHiddenInput();

                inputElement.value = "";
            }
        }

        function createFilterItem(text) {
            const item = document.createElement("div");
            item.setAttribute("class", "multi-search-item");
            const span = `<span>${text}</span>`;
            const close = `<div class="fa fa-close" onclick="removeItem(this)"></div>`;
            item.innerHTML = span + close;
            return item;
        }


        function removeItem(element) {
            const text = element.parentNode.querySelector('span').innerText;

            const index = keywords.indexOf(text);
            if (index > -1) {
                keywords.splice(index, 1);
            }

            console.log(keywords);

            updateHiddenInput();

            element.parentNode.remove();
        }

        function updateHiddenInput() {
            const hiddenInput = document.querySelector('input[name="keywords"]');
            hiddenInput.value = keywords.join(',');
        }
    </script>
</body>

</html>
