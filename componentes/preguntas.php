<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Collapse<?php echo $datoPregunta['id'] ?>" aria-expanded="false" aria-controls="Collapse<?php echo $datoPregunta['id'] ?>">
                <strong><?php echo $datoPregunta['pregunta'] ?></strong>
            </button>
        </h2>
        <div id="Collapse<?php echo $datoPregunta['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php echo $datoPregunta['respuesta'] ?>
            </div>
        </div>
    </div>
</div>