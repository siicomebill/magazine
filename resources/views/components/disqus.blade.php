@if(request()->AMP)
<section class="bg-gray-200 text-center py-8 px-2">
    <p>Reazioni e commenti non disponibili nella versione lite, per mostrarli <a href="{{request()->canonicalUrl}}" class="underline font-bold text-blue-500">vai alla pagina originale</a> dell'articolo.</p>
</section>
@else
<div id="disqus_thread"></div>
@endif