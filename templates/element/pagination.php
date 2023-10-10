<style>
    .pagination .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #162136;
        border-color: #162136;
    }
    .pagination .page-link
    {
        color: #6e90f6;
    }
</style>
<div class="col-md-4 offset-md-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="<?php echo $this->getRequest()->getParam("controller") === "Pages" && $this->getRequest()->getParam("action") === "blogs" ? "page-item disabled" : "page-item"; ?>">
                <a class="page-link" href="<?php echo $this->Url->build(['controller'=>'Pages','action' => 'blogs']);?>"><?php echo __("Previous")?></a>
            </li>
            <li class="<?php echo $this->getRequest()->getParam("controller") === "Pages" && $this->getRequest()->getParam("action") === "blogs" ? "page-item active" : "page-item"; ?>"><a class="page-link" href="<?php echo $this->Url->build(['controller'=>'Pages','action' => 'blogs']);?>"><?php echo __("1")?></a></li>
            <li class="<?php echo $this->getRequest()->getParam("controller") === "Pages" && $this->getRequest()->getParam("action") === "blogOne" ? "page-item active" : "page-item"; ?>"><a class="page-link" href="<?php echo $this->Url->build(['controller'=>'Pages','action' => 'blogOne']);?>"><?php echo __("2")?></a></li>
<!--            <li class="page-item active">-->
<!--			  <span class="page-link">-->
<!--				2-->
<!--				<span class="sr-only">(current)</span>-->
<!--			  </span>-->
<!--            </li>-->
            <li class="<?php echo $this->getRequest()->getParam("controller") === "Pages" && $this->getRequest()->getParam("action") === "blogOne" ? "page-item disabled" : "page-item";?>">
                <a class="page-link" href="<?php echo $this->Url->build(['controller'=>'Pages','action' => 'blogOne']);?>"><?php echo __("Next")?></a>
            </li>
        </ul>
    </nav>
</div>
