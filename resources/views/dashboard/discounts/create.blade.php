@extends('adminlte::page')

@section('title', 'Create Discount')

@section('content_header')
    <h1>Create Discount</h1>
@stop

@section('content')
    <form action="{{ route('dashboard.discounts.store') }}" method="POST">
        @csrf
        <div class="row">
            <x-adminlte-input name="code" label="Code" type="text" placeholder="EX: aaaa1111"
                fgroup-class="col-md-6"/>

            <x-adminlte-button theme="outline-primary" class="align-self-center" id="generate-code"  label="generate"/>

            <x-adminlte-input name="quantity" label="Quantity" type="number" placeholder="EX: 1- 100"
                fgroup-class="col-md-6"/>

            <x-adminlte-input name="percentage" label="Percentage" type="TEXT" placeholder="EX: %1.5- %90"
                fgroup-class="col-md-6"/>

            <x-adminlte-input name="expiry_date" label="Expiry Date" type="datetime-local"
                fgroup-class="col-md-6"/>

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>

        </div>
    </form>
@stop

@section('js')
    <script>
        const codeElement = document.querySelector('input[name=code]');

        const generateCodeElement = document.querySelector('#generate-code');

        generateCodeElement.addEventListener('click',insertCode);

        async function insertCode() {
            const code = generateDiscountCode();

            const is_exist = await checkCodeAvailable(checkCodeUrl,code);
            if(!is_exist){
                codeElement.value = code;
            }
        }

        const checkCodeUrl = "{{route('discount.check.code')}}" ;

        async function checkCodeAvailable(url,code) {
            const response = await fetch(url);
            const data = await response.json();
            return data.data.is_exist;
        }

        function generateDiscountCode() {
            const prefix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            const characters = "0123456789";
            let code = "";

            for (let i = 0; i < 5; i++) {
                const randomIndex = Math.floor(Math.random() * prefix.length);
                code += prefix[randomIndex];
            }

            for (let i = 0; i < 4; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                code += characters[randomIndex];
            }

            return code;
        }

    </script>
@stop
