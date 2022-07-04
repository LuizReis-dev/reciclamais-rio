package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import entidades.Material;

public class MateriaisDao {
    public static List<Material> getMateriais() {
        List<Material> list = new ArrayList<Material>();
        try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM material");
        ResultSet rs = ps.executeQuery();
        while(rs.next()){
            Material material = new Material();
            material.setId(rs.getInt("id"));
            material.setNome(rs.getString("nome"));
            material.setPreco_por_kg(rs.getDouble("preco_por_kg"));
            list.add(material);
        }       
    }catch(Exception erro){
        System.out.println(erro);
    }
        return list;
    }
}
