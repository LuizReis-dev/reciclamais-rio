package entidades;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;


public class Catador {
    private int id;
    private String nome;
    private String cpf;
    private String endereco;
    private Date data_de_nascimento;
    private String email;
    private String telefone;
    
    public Catador () {
    
    }
    public Catador(String nome, String cpf, String endereco, Date data_de_nascimento, String email, String telefone) {
        this.nome = nome;
        this.cpf = cpf;
        this.endereco = endereco;
        this.data_de_nascimento = data_de_nascimento;
        this.email = email;
        this.telefone = telefone;
    }

    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getCpf() {
        return cpf;
    }

    public void setCpf(String cpf) {
        this.cpf = cpf;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public Date getData_de_nascimento() {
        return data_de_nascimento;
    }

    public void setData_de_nascimento(Date data_de_nascimento) {
        this.data_de_nascimento = data_de_nascimento;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }
    
    public int calcularIdade(){
        Calendar hoje = Calendar.getInstance();
        Calendar dataDeNascimento = new GregorianCalendar();
        dataDeNascimento.setTime(this.data_de_nascimento);
        
        int idade = hoje.get(Calendar.YEAR) - dataDeNascimento.get(Calendar.YEAR);
        
        if(hoje.get(Calendar.MONTH) < dataDeNascimento.get(Calendar.MONTH)) {
            idade--;
        }else if(hoje.get(Calendar.MONTH) == dataDeNascimento.get(Calendar.MONTH)){
            if(hoje.get(Calendar.DAY_OF_MONTH) < dataDeNascimento.get(Calendar.DAY_OF_MONTH)){
                idade--;
            }
        }
        
        return idade;
    }
}

