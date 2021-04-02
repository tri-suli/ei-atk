<?php

namespace Tests\Feature\ItemTypes;

use Tests\TestCase;

class VisitItemTypesPageTest extends TestCase
{
    public function admin_can_visit_item_types_page(): void
    {
        $response = $this->get('item-types');

        $response->assertStatus(302);
    }
}
