<?php

class Front_Page_Statistics_Section
{
    public function __construct()
    {
        $section_statistics = get_field('section_statistics');
        $this->title = $section_statistics['title'];
        $this->text = $section_statistics['text'];
        $this->list = $section_statistics['item'];
        $this->statistics_series = $section_statistics['statistics_series'];
        $this->labels = $section_statistics['labels'];
    }

    public function sectionStyles()
    {
        return array();
    }

    public function sectionScripts()
    {
        return array();
    }

    public function render()
    { ?>

        <section class="statistics">
            <div class="container">
                <?php if(!empty($this->title)) : ?>
                <h2 class="section__title"><?php echo $this->title; ?></h2>
                <?php endif; ?>
                <?php if(!empty($this->text)) : ?>
                <h2 class="section__text center"><?php echo $this->text; ?> </h2>
                <?php endif; ?>
                 <div class="statistics__block">
                     <?php if(!empty($this->list)) : ?>
                     <ul class="statistics__list">
                         <?php foreach ($this->list as $item): ?>
                         <li class="statistics__item">
                             <h3><span class="counter" data-target="<?php echo $item['count']; ?>"><?php echo $item['text'];?></h3>
                             <h4><?php echo $item['title']; ?></h4>
                         </li>
                            <?php endforeach; ?>
                     </ul>
                        <?php endif; ?>
                    <div class="statistics__chart">

                        <?php
                        $series = [];
                        $legend = [];
                        $labels = isset($this->labels) ? array_map('trim', explode(',', $this->labels)) : [];
                        foreach ($this->statistics_series as $stat) {
                            $series[] = array_map('intval', explode(', ', $stat['series']));
                            if (!empty($stat['legend'])) {
                                $legend[] = $stat['legend'];
                            }
                        }
                        $series_json = json_encode($series);
                        $labels_json = json_encode($labels);
                        $legend_json = json_encode($legend);
                        ?>
                        <div id="chartData" data-chart='{
                        "labels": <?php echo $labels_json;?>,
                        "series": <?php echo $series_json;?>,
                        "legend": <?php echo $legend_json;?>
                    }'>
                        </div>
                        <canvas  class="chart__canvas"  height="300" ></canvas>
                    </div>
                </div>
            </div>
        </section>

    <?php }}
