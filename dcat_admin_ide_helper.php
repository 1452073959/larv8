<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection attempts
     * @property Grid\Column|Collection reserved_at
     * @property Grid\Column|Collection available_at
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection params
     * @property Grid\Column|Collection domain
     * @property Grid\Column|Collection response_content
     * @property Grid\Column|Collection response_code
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection system_no
     * @property Grid\Column|Collection send_status
     * @property Grid\Column|Collection brand_id
     * @property Grid\Column|Collection merchant_name
     * @property Grid\Column|Collection merchant_code
     * @property Grid\Column|Collection sn
     * @property Grid\Column|Collection agent_no
     * @property Grid\Column|Collection deal_money
     * @property Grid\Column|Collection settleamount_money
     * @property Grid\Column|Collection service_money
     * @property Grid\Column|Collection deal_type
     * @property Grid\Column|Collection rrn
     * @property Grid\Column|Collection deal_time
     * @property Grid\Column|Collection deal_status
     * @property Grid\Column|Collection deal_rate_fake
     * @property Grid\Column|Collection deal_rate
     * @property Grid\Column|Collection Raw_data
     * @property Grid\Column|Collection json_data
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection attempts(string $label = null)
     * @method Grid\Column|Collection reserved_at(string $label = null)
     * @method Grid\Column|Collection available_at(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection params(string $label = null)
     * @method Grid\Column|Collection domain(string $label = null)
     * @method Grid\Column|Collection response_content(string $label = null)
     * @method Grid\Column|Collection response_code(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection system_no(string $label = null)
     * @method Grid\Column|Collection send_status(string $label = null)
     * @method Grid\Column|Collection brand_id(string $label = null)
     * @method Grid\Column|Collection merchant_name(string $label = null)
     * @method Grid\Column|Collection merchant_code(string $label = null)
     * @method Grid\Column|Collection sn(string $label = null)
     * @method Grid\Column|Collection agent_no(string $label = null)
     * @method Grid\Column|Collection deal_money(string $label = null)
     * @method Grid\Column|Collection settleamount_money(string $label = null)
     * @method Grid\Column|Collection service_money(string $label = null)
     * @method Grid\Column|Collection deal_type(string $label = null)
     * @method Grid\Column|Collection rrn(string $label = null)
     * @method Grid\Column|Collection deal_time(string $label = null)
     * @method Grid\Column|Collection deal_status(string $label = null)
     * @method Grid\Column|Collection deal_rate_fake(string $label = null)
     * @method Grid\Column|Collection deal_rate(string $label = null)
     * @method Grid\Column|Collection Raw_data(string $label = null)
     * @method Grid\Column|Collection json_data(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection attempts
     * @property Show\Field|Collection reserved_at
     * @property Show\Field|Collection available_at
     * @property Show\Field|Collection url
     * @property Show\Field|Collection method
     * @property Show\Field|Collection params
     * @property Show\Field|Collection domain
     * @property Show\Field|Collection response_content
     * @property Show\Field|Collection response_code
     * @property Show\Field|Collection time
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection system_no
     * @property Show\Field|Collection send_status
     * @property Show\Field|Collection brand_id
     * @property Show\Field|Collection merchant_name
     * @property Show\Field|Collection merchant_code
     * @property Show\Field|Collection sn
     * @property Show\Field|Collection agent_no
     * @property Show\Field|Collection deal_money
     * @property Show\Field|Collection settleamount_money
     * @property Show\Field|Collection service_money
     * @property Show\Field|Collection deal_type
     * @property Show\Field|Collection rrn
     * @property Show\Field|Collection deal_time
     * @property Show\Field|Collection deal_status
     * @property Show\Field|Collection deal_rate_fake
     * @property Show\Field|Collection deal_rate
     * @property Show\Field|Collection Raw_data
     * @property Show\Field|Collection json_data
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection attempts(string $label = null)
     * @method Show\Field|Collection reserved_at(string $label = null)
     * @method Show\Field|Collection available_at(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection params(string $label = null)
     * @method Show\Field|Collection domain(string $label = null)
     * @method Show\Field|Collection response_content(string $label = null)
     * @method Show\Field|Collection response_code(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection system_no(string $label = null)
     * @method Show\Field|Collection send_status(string $label = null)
     * @method Show\Field|Collection brand_id(string $label = null)
     * @method Show\Field|Collection merchant_name(string $label = null)
     * @method Show\Field|Collection merchant_code(string $label = null)
     * @method Show\Field|Collection sn(string $label = null)
     * @method Show\Field|Collection agent_no(string $label = null)
     * @method Show\Field|Collection deal_money(string $label = null)
     * @method Show\Field|Collection settleamount_money(string $label = null)
     * @method Show\Field|Collection service_money(string $label = null)
     * @method Show\Field|Collection deal_type(string $label = null)
     * @method Show\Field|Collection rrn(string $label = null)
     * @method Show\Field|Collection deal_time(string $label = null)
     * @method Show\Field|Collection deal_status(string $label = null)
     * @method Show\Field|Collection deal_rate_fake(string $label = null)
     * @method Show\Field|Collection deal_rate(string $label = null)
     * @method Show\Field|Collection Raw_data(string $label = null)
     * @method Show\Field|Collection json_data(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
