<style>
    .select-box {
        display: flex;
        width: 400px;
        flex-direction: column;
    }

    .select-box .options-container {
        background: #2f3640;
        color: #f5f6fa;
        max-height: 0;
        width: 100%;
        opacity: 0;
        transition: all 0.4s;
        border-radius: 8px;
        overflow: hidden;

        order: 1;
    }

    .selected {
        background: #2f3640;
        border-radius: 8px;
        margin-bottom: 8px;
        color: #FFFFFF;
        position: relative;

        order: 0;
    }

    .selected::after {
        content: "";
        background-size: contain;
        background-repeat: no-repeat;

        position: absolute;
        height: 100%;
        width: 32px;
        right: 10px;
        top: 5px;

        transition: all 0.4s;
    }

    .select-box .options-container.active {
        max-height: 240px;
        opacity: 1;
        overflow-y: scroll;
    }

    .select-box .options-container.active + .selected::after {
        transform: rotateX(180deg);
        top: -6px;
    }

    .select-box .options-container::-webkit-scrollbar {
        width: 8px;
        background: #0d141f;
        border-radius: 0 8px 8px 0;
    }

    .select-box .options-container::-webkit-scrollbar-thumb {
        background: #525861;
        border-radius: 0 8px 8px 0;
    }

    .select-box .option,
    .selected {
        padding: 12px 24px;
        cursor: pointer;
    }

    .select-box .option:hover {
        background: #414b57;
    }

    .select-box label {
        cursor: pointer;
    }
</style>

<label class="block font-medium text-sm text-gray-700">
    {{ $label }}
</label>
<div class="select-box">
    <div class="options-container">
        {{ $main }}
    </div>
    <div class="selected">
        <h7 class="font-semibold text-xl text-gray-50 leading-tight">
            {{$selected}}
        </h7>
    </div>
</div>

<script>

    const selected = document.querySelector(".selected");
    const optionsContainer = document.querySelector(".options-container");
    const optionsList = document.querySelectorAll(".option");
    const inputValue = document.querySelector(".inputvalue");

    selected.addEventListener("click", () => {
        optionsContainer.classList.toggle("active");
    });

    optionsList.forEach(o => {
        o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector("option").innerHTML;
            console.log(o.querySelector("option").value);
            inputValue.value = o.querySelector("option").value;
            optionsContainer.classList.remove("active");
        });
    });


</script>
