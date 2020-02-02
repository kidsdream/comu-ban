<div class="l-flex u-mt30 addContent">
  {foreach from=$contents key="key" item="item"}
    <article class="p-contents">
      <div class="p-info">
        <h2 class="p-info__name">{$item.name}</h2>
        <time class="p-info__time">{date('Y年m月d日 H:i', strtotime($item.created_at))}</time>
      </div>
      <p class="p-message">{$item.message}</p>
      <p class="p-category">{$item.category}</p>
    </article>
  {/foreach}
</div>
