<div class="theme">
        <input type="checkbox" class="checkbox" id="checkbox">
        <label for="checkbox" class="label">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
        </label>
</div>
<script>
const checkbox = document.getElementById('checkbox');
const isDarkMode = localStorage.getItem('isDarkMode');
if (isDarkMode === 'true') {
  document.body.classList.add('dark');
  checkbox.checked = true;
}
checkbox.addEventListener('change',() => {
  document.body.classList.toggle('dark');
  localStorage.setItem('isDarkMode', checkbox.checked);
});

</script>
<style>
.theme{
    position: fixed;
    left: 2rem;
    top: 10rem;
}
.label{
    background-color: #111;
    display: flex;
    height: 26px;
    width: 50px;
    position: relative;
    border-radius: 50px;
    align-items: center;
    justify-content: space-between;
    padding: 5px;
    transform: scale(1.5);
    cursor: pointer;
}
.fa-moon{
    color: #f1c40f;
}
.fa-sun{
    color: #f39c12;
}
.ball{
    background-color: #fff;
    height: 22px;
    width: 22px;
    position: absolute;
    top: 2px;
    left: 2px;
    border-radius: 50%;
    transition: transform 0.2s linear ;
}
.checkbox{
    opacity: 0;
    position: absolute;
}
.checkbox:checked + .label .ball{
    transform: translateX(24px);
    background-color: #252525;
}
.checkbox:checked + .label{
    background-color: #CCD6DD;
}
@media (max-width: 100em){
    .label{
        height: 18px;
        width: 37px;
    }
    .ball{
        height: 16px;
        width: 16px;
        top: 1px;
        left: 1px;
    }
    .checkbox:checked + .label .ball{
        transform: translateX(19px);
    }
    .fa-moon{
        font-size: 12px;
    }
    .fa-sun{
        font-size: 12px;
    }
    .theme{
        top: 1rem;
        left: 92%;
    }
}
@media (max-width: 85em){
    .theme{
        left: 90%
    }
}
@media (max-width: 68em){
    .theme{
        left: 89%;
    }
}
@media (max-width: 60em){
    .theme{
        left: 87%;
    }
}
@media (max-width: 50em){
    .theme{
        left: 83%;
    }
}
@media (max-width: 40em){
    .theme{
        left: 77%;
    }
}
@media (max-width: 30em){
    .theme{
        left: 77%;
    }
}
@media (max-width: 375px){
    .theme{
        left: 70%;
    }
}
</style>