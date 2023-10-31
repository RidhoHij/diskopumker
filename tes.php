<?php if(!empty($row['file'])) { ?>
                <td align="center"><a href='dist/surat_masuk/<?php echo $row['file'] ?>" target="_blank"><i class="fa fa-file" style="font-size: 20px;"></i></a></td>
                <?php } else if(empty($row['file'])) { ?>
                    <td align="center"><a href="dist/surat_masuk/<?php echo $row['file'] ?>" target="_blank"></a></td>
                <?php } ?>