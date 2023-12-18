<?php

use App\Utils\Encryption;
use App\Utils\RandomKey;

 ob_start()?>
 
    <!--Search bar-->
    <div id="recherche">
        <input type="text" placeholder="Recherche">
        <i class='bx bx-search'></i>
    </div>
    <!--body add task-->
    <section class="espace">
        <?php foreach($tab as $tasks):?>
            <article class="task">
                <div>
                    <input type="text" class="txtTask" title="<?=$tasks->description_tasks?>" placeholder="Tapez votre tâche :" value="<?=$tasks->title_tasks?>" disabled>
                    <button class="btnTask btnModify"><a href="./editTasks?id_tasks=<?=Encryption::encryptData($tasks->id_tasks, RandomKey::generateRandomKey() , openssl_random_pseudo_bytes(16))?>"><i class='bx bx-edit btnTask btnModify' style='color: orange' ></i></a></button>
                    <button class="btnTask btnCalendar"><i class='bx bx-calendar' style='color: blue' ></i></button>
                    <button class="btnTask btnValidate"><i class='bx bx-calendar-check' style='color: green' ></i></a></button>
                    <button class="btnTask btnRemove"><a href="./removeTasks"><i class='bx bx-trash' style='color: red' ></i></a></button>
                </div>
            </article>
        <?php endforeach ?>
    </section>
    <!--Calendar-->
    <section id="calendar">
        <!--Mouth-->
    
        <i class='bx bxs-left-arrow' style='color:#551b8c' id="btnMonthLeft"></i>
        <h1 class="itemMouth">Octobre 2023</h1>
        <i class='bx bxs-right-arrow' style='color:#551b8c' id="btnMonthRight"></i>

        <!--Day of week-->
        <div id="itemMonday" class="itemDayWeek">Lundi</div>
        <div id="itemTuesday" class="itemDayWeek">Mardi</div>
        <div id="itemWednesday" class="itemDayWeek">Mercredi</div>
        <div id="itemThursday" class="itemDayWeek">Jeudi</div>
        <div id="itemFriday" class="itemDayWeek">Vendredi</div>
        <div id="itemSaturday" class="itemDayWeek">Samedi</div>
        <div id="itemSunday" class="itemDayWeek">Dimanche</div>
        <!--One week-->
        <div class="itemDay">1</div>
        <div class="itemDay">2</div>
        <div class="itemDay">3</div>
        <div class="itemDay">4</div>
        <div class="itemDay">5</div>
        <div class="itemDay">6</div>
        <div class="itemDay">7</div>
        <!--Two week-->
        <div class="itemDay">8</div>
        <div class="itemDay">9</div>
        <div class="itemDay">10</div>
        <div class="itemDay">11</div>
        <div class="itemDay">12</div>
        <div class="itemDay">13</div>
        <div class="itemDay">14</div>
        <!--Three week-->
        <div class="itemDay">15</div>
        <div class="itemDay">16</div>
        <div class="itemDay">17</div>
        <div class="itemDay">18</div>
        <div class="itemDay">19</div>
        <div class="itemDay">20</div>
        <div class="itemDay">21</div>
        <!--Four week-->
        <div class="itemDay">22</div>
        <div class="itemDay">23</div>
        <div class="itemDay">24</div>
        <div class="itemDay">25</div>
        <div class="itemDay">26</div>
        <div class="itemDay">27</div>
        <div class="itemDay">28</div>
        <!--Five week-->
        <div class="itemDay">29</div>
        <div class="itemDay">30</div>
        <div class="itemDay">31</div>
        <div class="itemDay">1</div>
        <div class="itemDay">2</div>
        <div class="itemDay">3</div>
        <div class="itemDay">4</div>
    </section>

<?php $content = ob_get_clean()?>
