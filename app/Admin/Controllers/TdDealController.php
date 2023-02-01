<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\TdDeal;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;


class TdDealController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new TdDeal(), function (Grid $grid) {


            $grid->selector(function (Grid\Tools\Selector $selector) {
                $selector->select('brand_id', '品牌', [
                    1 => '电银',
                    2=>'联动',
                    3=>'收付贝',
                    4=>'钱宝',
                    5=>'合利宝',
                    6=>'金控',
                    7=>'海科',
                    8=>'付临门',
                    9=>'合利宝gm',
                    10=>'拉卡拉',
                    11=>'中付'
                ]);
            });


            $grid->withBorder();
            $grid->addTableClass(['table-text-center']);//文字居中
//            $grid->number();
            // 禁止
            // 禁用创建按钮
            $grid->disableCreateButton();
            // 禁用详情按钮
            $grid->disableViewButton();
            // 禁用编辑按钮
            $grid->disableEditButton();
            // 显示快捷编辑按钮
            $grid->showQuickEditButton();
            $grid->toolsWithOutline(false);
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('brand_id');
            $grid->column('merchant_name');
            $grid->column('merchant_code');
            $grid->column('sn');
            $grid->column('agent_no');
            $grid->column('deal_money');
            $grid->column('settleamount_money');
            $grid->column('service_money');
            $grid->column('deal_type');
            $grid->column('rrn');
            $grid->column('deal_time');
//            $grid->column('deal_status');
            $grid->column('json_data')
                ->display('详情') // 设置按钮名称
                ->expand(function () {
                    // 返回显示的详情
                    // 这里返回 content 字段内容，并用 Card 包裹起来
                    $card = new Card(null, $this->json_data);

                    return "<div style='width: 1000px; padding:20px 20px 0'>$card</div>";
                });;
            $grid->column('Raw_data')
                ->display('推送交易') // 设置按钮名称
                ->expand(function () {
                    // 返回显示的详情
                    // 这里返回 content 字段内容，并用 Card 包裹起来
                    $card = new Card(null, $this->Raw_data);

                    return "<div style='width: 1000px; padding:20px 20px 0'>$card</div>";
                });;
            $grid->column('deal_rate');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new TdDeal(), function (Show $show) {
            $show->field('id');
            $show->field('brand_id');
            $show->field('merchant_name');
            $show->field('merchant_code');
            $show->field('sn');
            $show->field('agent_no');
            $show->field('deal_money');
            $show->field('settleamount_money');
            $show->field('service_money');
            $show->field('deal_type');
            $show->field('rrn');
            $show->field('deal_date');
            $show->field('deal_time');
            $show->field('deal_status');
            $show->field('deal_rate_fake');
            $show->field('deal_rate');
            $show->field('deal_create_time');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new TdDeal(), function (Form $form) {
            $form->display('id');
            $form->text('brand_id');
            $form->text('merchant_name');
            $form->text('merchant_code');
            $form->text('sn');
            $form->text('agent_no');
            $form->text('deal_money');
            $form->text('settleamount_money');
            $form->text('service_money');
            $form->text('deal_type');
            $form->text('rrn');
            $form->text('deal_date');
            $form->text('deal_time');
            $form->text('deal_status');
            $form->text('deal_rate');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
