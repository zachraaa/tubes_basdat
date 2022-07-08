@extends('welcome')

@section('konten')
<main class="card">
            <form class="display">
                <input id="screen" placeholder="0">
            </form>
            <section class="button">
                <div class="tombol-kiri">
                    <button class="tombol" onclick="display('clear')">C/CE</button>
                    <button class="tombol" onclick="">MRC</button>
                    <button class="tombol" onclick="">M-</button>
                    <button class="tombol" onclick="">M+</button>
                    <button class="tombol" onclick="">GT</button>
                    <button class="tombol" onclick="display('7')">7</button>
                    <button class="tombol" onclick="display('8')">8</button>
                    <button class="tombol" onclick="display('9')">9</button>
                    <button class="tombol" onclick="display('%')">%</button>
                    <button class="tombol" onclick="">></button>
                    <button class="tombol" onclick="display('4')">4</button>
                    <button class="tombol" onclick="display('5')">5</button>
                    <button class="tombol" onclick="display('6')">6</button>
                    <button class="tombol" onclick="display('*')">X</button>
                    <button class="tombol" onclick="display('/')">/</button>
                    <button class="tombol" onclick="display('1')">1</button>
                    <button class="tombol" onclick="display('2')">2</button>
                    <button class="tombol" onclick="display('3')">3</button>
                    <button class="tombol" onclick="display('+')">+</button>
                    <button class="tombol" onclick="display('-')">-</button>
                    <button class="tombol" onclick="display('0')">0</button>
                    <button class="tombol" onclick="display('00')">00</button>
                    <button class="tombol" onclick="display('.')">.</button>
                    <button class="tombol" onclick="display('**')">^</button>
                    <button class="tombol" onclick="display('action')">=</button>
                </div>
            </section>
    </main>

    <script languange="Javascript">
        let result = document.getElementById('screen')
        const display = (a) => {
            if (a == 'clear') {
                result.value = ''
            }else if (a == 'del') {
                result.value = result.value.slice(0,-1)
            }else if (a == 'action') {
                result.value = eval(result.value)
            }
            else{
                result.value += a
            }
        }
    </script>
@endsection