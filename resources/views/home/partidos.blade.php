<style>
    
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">ligas</b>
    </div>
    <b class="subtitle">partidos</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
</div>


<script>
   var partidos = {!! $partidos !!},
       copa = '{{ $copa }}',
       fase = parseInt('{{ $fase }}'),
       zona = '{{ $zona }}',
       src_copa = 'default/' + copa + '.png'

   
   log('partidos', [partidos])
   $(function(){
    setBar($('#bar'), src_copa, [copa, getNameFase(copa, fase, zona)].join(' - '), getColorCopa(copa), 'partidos')


    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
      goBack(true)
    }))
     preload()
   })
</script>
