<link href="css/acontent.css" rel="stylesheet" type="text/css"/>

<div class="kartalar-bolim">
  <h1>BIZNING PULLIK XIZMATLARIMIZ</h1> <!-- Header va kartalar orasidagi yozuv -->
  
 <style>
  .table-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 20px 0;
  }

  .custom-table {
    width: 90%;
    max-width: 1000px;
    border-collapse: collapse;
    font-family: sans-serif;
  }

  .custom-table thead {
    background-color: #f0f0f0;
  }

  .custom-table th, .custom-table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
  }

  @media screen and (max-width: 768px) {
    .custom-table thead {
      display: none;
    }

    .custom-table, .custom-table tbody, .custom-table tr, .custom-table td {
      display: block;
     
    }

    .custom-table tr {
      margin-bottom: 15px;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #fff;
    }

    .custom-table td {
      text-align: right;
      padding-left: 50%;
      position: relative;
    }

    .custom-table td::before {
      content: attr(data-label);
      position: absolute;
      left: 10px;
      width: 45%;
      white-space: nowrap;
      text-align: left;
      font-weight: bold;
    }
  }
</style>

<div class="table-wrapper">
  <table class="custom-table">
    <thead>
      <tr>
        <th>№</th>
        <th>Xizmat nomi</th>
        <th>Tavsif</th>
        <th>Bajarish muddati</th>
        <th>Narxi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-label="№">1</td>
        <td data-label="Xizmat nomi">Biznes reja tuzib berish</td>
        <td data-label="Tavsif">1-3 kun oralig'ida biznes reja tayyorlab berish</td>
        <td data-label="Bajarish muddati">1–3 kun</td>
        <td data-label="Narxi">100 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">2</td>
        <td data-label="Xizmat nomi">Biznesni ro'yxatdan o'tkazish</td>
        <td data-label="Tavsif">YaTT,MCHJ va boshqalarni ochishda yordam , Davlar bojisiz</td>
        <td data-label="Bajarish muddati">3-5 kun oralig'ida</td>
        <td data-label="Narxi">187 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">3</td>
        <td data-label="Xizmat nomi">Buxgalteriya hisobini yuritib berish</td>
        <td data-label="Tavsif">Soliq va hisobotlar tayyorlab berish</td>
        <td data-label="Bajarish muddati">1-30 kun oralig'ida</td>
        <td data-label="Narxi">1 mln so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">4</td>
        <td data-label="Xizmat nomi">Chet eldan uskuna va texnologiyalar izlash</td>
        <td data-label="Tavsif">Uskuna turiga qarab</td>
        <td data-label="Bajarish muddati">1-7 kun oralig'ida</td>
        <td data-label="Narxi">187 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">5</td>
        <td data-label="Xizmat nomi">Brend uchun logotip tayyorlash</td>
        <td data-label="Tavsif">Induvidual so'rovdan kelib chiqib 3 ta variantda</td>
        <td data-label="Bajarish muddati">5-10 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">6</td>
        <td data-label="Xizmat nomi">Web sayt yaratib berish</td>
        <td data-label="Tavsif">5 ta sahifagacha bo'lgan web sayt dizayni yaratilib ishga tushirib beriladi</td>
        <td data-label="Bajarish muddati">10-14 kun oralig'ida</td>
        <td data-label="Narxi">1 mln 200 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">7</td>
        <td data-label="Xizmat nomi">Biznes loyiha infografikasi</td>
        <td data-label="Tavsif">Mahsulot va xizmatlar iqtisodiy ko'rsatkichlarini infografikada ko'rsatib berish</td>
        <td data-label="Bajarish muddati">1-3 kun oralig'ida</td>
        <td data-label="Narxi">187 ming 500 so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">8</td>
        <td data-label="Xizmat nomi">Biznes loyiha uchun taqdimot yaratib berish</td>
        <td data-label="Tavsif">10-15 sahifadan iborat taqdimot tayyorlash</td>
        <td data-label="Bajarish muddati">1-3 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">9</td>
        <td data-label="Xizmat nomi">Biznes loyiha planshetini yaratib berish</td>
        <td data-label="Tavsif">Biznes loyiha uchun mahsulot va xizmat turlari haqida planshet</td>
        <td data-label="Bajarish muddati">1-3 kun oralig'ida</td>
        <td data-label="Narxi">187 ming 500 so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">10</td>
        <td data-label="Xizmat nomi">Buklet yoki flayerlar</td>
        <td data-label="Tavsif">Mahsulot yoki xizmat haqida buklet yoki flayerlar tayyorlash</td>
        <td data-label="Bajarish muddati">1-3 kun oralig'ida</td>
        <td data-label="Narxi">187 ming 500 so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">11</td>
        <td data-label="Xizmat nomi">Mahsulot katalogi</td>
        <td data-label="Tavsif">Mahsulot rasmi, parametr va baholari kiritilgan katolog</td>
        <td data-label="Bajarish muddati">3-10 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">12</td>
        <td data-label="Xizmat nomi">Ijtimoiy tarmoqlarni yuritish</td>
        <td data-label="Tavsif">Akkaunt yaratish va yuritish , paket asosida</td>
        <td data-label="Bajarish muddati">7 kun davomida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">13</td>
        <td data-label="Xizmat nomi">Mahsulotlar rasmlari va mockuplar</td>
        <td data-label="Tavsif">Uzumlar,Wildberries, katalog va h.k. lar uchun professional sur'atlar</td>
        <td data-label="Bajarish muddati">1-2 kungacha</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">14</td>
        <td data-label="Xizmat nomi">Koworking uchun joy topib berish</td>
        <td data-label="Tavsif">Kelishuv asosida</td>
        <td data-label="Bajarish muddati">Kelishilgan holda</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">15</td>
        <td data-label="Xizmat nomi">Eksportyorlarga tijoriy taklif tayyorlab berish</td>
        <td data-label="Tavsif">Tijoriy taklif tayyorlab berish bo'yicha yordam</td>
        <td data-label="Bajarish muddati">3-5 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">16</td>
        <td data-label="Xizmat nomi">Potensial hamkor topib berish</td>
        <td data-label="Tavsif">Hamkorlar va networking o'rnatish</td>
        <td data-label="Bajarish muddati">10-30 kun oralig'ida</td>
        <td data-label="Narxi">750 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">17</td>
        <td data-label="Xizmat nomi">Texnik iqtisodiy asoslarni ishlab chiqish (TEO)</td>
        <td data-label="Tavsif">TEO tayyorlash</td>
        <td data-label="Bajarish muddati">5-10 kun oralig'ida</td>
        <td data-label="Narxi">1 mln 500 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">18</td>
        <td data-label="Xizmat nomi">Auksion savdolari orqali yer va bino masalalarida ishtirok etishda ko'maklashish</td>
        <td data-label="Tavsif">Auksionda yordam</td>
        <td data-label="Bajarish muddati">1-5 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">19</td>
        <td data-label="Xizmat nomi">Soliq hisobotlarini yuritishga ko'maklashish</td>
        <td data-label="Tavsif">Soliq hisobotlar tayyorlab berish</td>
        <td data-label="Bajarish muddati">1-30 kun oralig'ida</td>
        <td data-label="Narxi">1 mln so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">20</td>
        <td data-label="Xizmat nomi">Buxgalteriya hisobini yuritishga ko'maklashish</td>
        <td data-label="Tavsif">Buxgalteriya hisobotlar tayyorlab berish</td>
        <td data-label="Bajarish muddati">1-30 kun oralig'ida</td>
        <td data-label="Narxi">1 mln so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">21</td>
        <td data-label="Xizmat nomi">Ta'sis va moliya hujjatlarini tayyorlab berish</td>
        <td data-label="Tavsif">Kerakli hujjatlarni tayyorlab berish</td>
        <td data-label="Bajarish muddati">1-2 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">22</td>
        <td data-label="Xizmat nomi">Reklama tayyorlash , tijorat takliflarini joylashtirishga ko'maklashish</td>
        <td data-label="Tavsif">Reklama taraflama yordam</td>
        <td data-label="Bajarish muddati">1-2 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">23</td>
        <td data-label="Xizmat nomi">Tarjima xizmatlari</td>
        <td data-label="Tavsif">Kelishuv asosida 1 bet uchun</td>
        <td data-label="Bajarish muddati">1-2 kun oralig'ida</td>
        <td data-label="Narxi">37 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">24</td>
        <td data-label="Xizmat nomi">Ko'rgazma-yarmarka, biznes uchrashuvlar va taqdimotlar tashkil etish</td>
        <td data-label="Tavsif">Kelishuv asosida tashkiliy masalalar</td>
        <td data-label="Bajarish muddati">4-10 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">25</td>
        <td data-label="Xizmat nomi">Tovar , xom-ashyo , tayyor mahsulotlarga xaridor topish</td>
        <td data-label="Tavsif">Kelishuv asosida xaridor topish</td>
        <td data-label="Bajarish muddati">5-15 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">26</td>
        <td data-label="Xizmat nomi">Birja savdolari uchun savdo maydonchalariga mahsulot joylashtirish xizmati</td>
        <td data-label="Tavsif">Onlayn savdo bazalarida mahsulotingizni tayyorlash</td>
        <td data-label="Bajarish muddati">1-3 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">27</td>
        <td data-label="Xizmat nomi">Mahsulot yoki tovarning 3D modelini yaratish (Vizualizatsiya uchun)</td>
        <td data-label="Tavsif">3D modellashtirish</td>
        <td data-label="Bajarish muddati">2-3 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">28</td>
        <td data-label="Xizmat nomi">Mahsulot yoki tovarning 3D modelini yaratish (3D printer uchun)</td>
        <td data-label="Tavsif">3D modellashtirish</td>
        <td data-label="Bajarish muddati">2-3 kun oralig'ida</td>
        <td data-label="Narxi">375 ming so'mdan boshlab</td>
      </tr>
       <tr>
        <td data-label="№">29</td>
        <td data-label="Xizmat nomi">Mahsulot yoki tovarning qisqa 3D animatsiyasini yaratish</td>
        <td data-label="Tavsif">10-15 sekundlik animatsiya</td>
        <td data-label="Bajarish muddati">4-5 kun oralig'ida</td>
        <td data-label="Narxi">500 ming so'mdan boshlab</td>
      </tr>
      <tr>
        <td data-label="№">30</td>
        <td data-label="Xizmat nomi">Mahsulot yoki tovarning motion dizayn roligini tayyorlash</td>
        <td data-label="Tavsif">Reklama roligi</td>
        <td data-label="Bajarish muddati">7-15 kun oralig'ida</td>
        <td data-label="Narxi">1 mln so'mdan boshlab</td>
      </tr>
      
      
    </tbody>
  </table>
</div>

 

