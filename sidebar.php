    <div id="sidebar">

        <div class="row-fluid">

            <div class="span9">
                <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>

                    <!-- 最新回复（可选择是否关闭） -->


                    <h4><?php _e('最近回复'); ?></h4>
                    <ul>
                        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                        <?php while($comments->next()): ?>
                            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <!-- 最新文章（可选择是否关闭） -->

                <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                    <div>
                        <h4><?php _e('最新文章'); ?></h4>
                        <ul>
                            <?php $this->widget('Widget_Contents_Post_Recent','pageSize=7')
                            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
                        </ul>
                    </div>

                <?php endif; ?>

                <!-- 站内搜索（默认开启） -->

                <h4><?php _e('站内搜索'); ?></h4>

                <p><form method="post" action="">
                    <div><input type="text" name="s" class="text" size="14" placeholder="I'm Feeling Lucky"/> <input type="submit" class="submit" value="Search" /></div>
                </form></p>

                <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
                    <div class="span3">
                        <h4><?php _e('高级'); ?></h4>
                        <ul>
                            <?php if($this->user->hasLogin()): ?>
                                <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                            <?php else: ?>
                                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
                            <?php endif; ?>
                            <li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
                            <li><a href="http://www.typecho.org">Typecho</a></li>
                        </ul>
                    </div>
                <?php endif; ?>

            </div> <!-- left section of side bar-->

            <div class="span3">



                <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>

                    <!-- 右边栏文章分类（可选择是否关闭） -->

                    <div class="widget">
                        <h4><?php _e('文章分类'); ?></h4>
                        <ul>
                            <?php $this->widget('Widget_Metas_Category_List')
                            ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
                        </ul>
                    </div>
                <?php endif; ?>



                <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>

                    <!-- 右边栏文章归档（可选择是否关闭） -->


                    <div>
                        <h4><?php _e('文章归档'); ?></h4>
                        <ul>
                            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div> <!-- right section of sidebar-->
        </div> <!-- row-fluid end-->
    </div>




</div><!-- end #sidebar -->
